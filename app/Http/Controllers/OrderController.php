<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'city_id' => 'nullable|exists:cities,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {

            // Create order
            $order = Order::create([
                'user_id' => $data['user_id'] ?? null,
                'city_id' => $data['city_id'] ?? null,
                'status'  => 'pending',
                'total'   => 0
            ]);

            $total = 0;

            foreach ($data['items'] as $it) {

                $product = Product::findOrFail($it['product_id']);

                // -----------------------------------
                // 🔥 FIXED PRICE SELECTION LOGIC
                // -----------------------------------
                $possiblePrices = [
                    $product->total_selling_price,
                    $product->s_discount_price,
                    $product->s_price,
                    $product->selling_price ?? null,
                    $product->price ?? null
                ];

                // Remove null/zero
                $filtered = array_filter($possiblePrices, function ($p) {
                    return $p !== null && $p > 0;
                });

                if (count($filtered) === 0) {
                    throw new \Exception("Product {$product->id} has no valid price");
                }

                // Pick the lowest valid price
                $price = min($filtered);
                // -----------------------------------

                $qty = intval($it['qty']);
                $lineTotal = $price * $qty;

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $qty,
                    'price'      => $price,
                    'total'      => $lineTotal,
                ]);

                $total += $lineTotal;
            }

            // Update total
            $order->update(['total' => $total]);

            // Create delivery for tomorrow
            Delivery::create([
                'order_id'       => $order->id,
                'scheduled_date' => now()->addDay()->toDateString(),
                'status'         => 'scheduled'
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'total' => $total
            ], 201);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
