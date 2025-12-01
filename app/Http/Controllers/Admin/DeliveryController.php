<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\City;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $q = Delivery::with(['order.user','warehouse','order.items']);

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $q->whereBetween('scheduled_date', [$request->date_from, $request->date_to]);
        }
        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }
        if ($request->filled('city_id')) {
            $q->whereHas('order', fn($qr) => $qr->where('city_id', $request->city_id));
        }
        if ($request->filter === 'today') $q->whereDate('scheduled_date', now()->toDateString());
        if ($request->filter === 'tomorrow') $q->whereDate('scheduled_date', now()->addDay()->toDateString());
        if ($request->filter === 'rescheduled') $q->where('status','rescheduled');

        $deliveries = $q->orderBy('scheduled_date')->paginate(20);
        $cities = City::pluck('name','id');
        return view('admin.deliveries.index', compact('deliveries','cities'));
    }

    public function markDelivered(Delivery $delivery)
    {
        $delivery->update(['status' => 'delivered']);
        return back()->with('success','Marked delivered');
    }

    public function markFailed(Request $request, Delivery $delivery)
    {
        $delivery->update(['status' => 'failed','notes'=>$request->notes]);
        return back()->with('success','Marked failed');
    }
}
