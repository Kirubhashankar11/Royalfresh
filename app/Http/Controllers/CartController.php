<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
    }

    // Add to cart (AJAX)
    public function add(Request $request)
    {
        $productId = $request->product_id;
        $qty = $request->qty ?? 1;

        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (!isset($cart[$productId])) {
            $cart[$productId] = [
                'name' => $product->product_name,
                'price' => $product->total_selling_price 
                           ?? $product->s_discount_price 
                           ?? $product->s_price 
                           ?? 0,
                'image' => $product->featured_image,
                'qty' => (int)$qty
            ];
        } else {
            $cart[$productId]['qty'] += (int)$qty;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => $product->product_name . " added to cart",
            'cart_count' => count($cart)
        ]);
    }
}
