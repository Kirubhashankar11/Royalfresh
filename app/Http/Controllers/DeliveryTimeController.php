<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTime;
use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    public function index()
    {
        $deliveryTimes = DeliveryTime::all();
        return view('delivery_times.index', compact('deliveryTimes'));
    }

    public function create()
    {
        $availableCities = ['Dubai', 'Sharjah', 'Ajman', 'Abu Dhabi', 'Al Ain', 'Fujairah', 'Ras Al Khaimah', 'Umm Al Quwain'];
        return view('delivery_times.create', compact('availableCities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'city' => 'required|min:1',
            'time_slot' => 'required|string|max:255',
            'charge' => 'required|numeric|min:0',
        ]);

        DeliveryTime::create([
            'city' => $request->city,
            'time' => $request->time_slot,
            'charge' => $request->charge,
        ]);

        return redirect('delivery-times')->with('success', 'Delivery time added successfully!');
    }

    public function edit($id)
    {
        $deliveryTime = DeliveryTime::findOrFail($id);
        $availableCities = ['Dubai', 'Sharjah', 'Ajman', 'Abu Dhabi', 'Al Ain', 'Fujairah', 'Ras Al Khaimah', 'Umm Al Quwain'];
    //    dd($deliveryTime);
        return view('delivery_times.edit', compact('deliveryTime', 'availableCities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required|min:1',
            'time_slot' => 'required|string|max:255',
            'charge' => 'required|numeric|min:0',
        ]);

        $deliveryTime = DeliveryTime::findOrFail($id);
        $deliveryTime->update([
            'city' => $request->city,
            'time' => $request->time_slot,
            'charge' => $request->charge,
        ]);

        return redirect('delivery-times')->with('success', 'Delivery time updated successfully!');
    }

    public function destroy($id)
    {
        DeliveryTime::findOrFail($id)->delete();
        return redirect('delivery-times')->with('success', 'Delivery time deleted successfully!');
    }

    public function getDeliverySlots(Request $request)
{
    $city = $request->city;

    $slots = DeliveryTime::where('city', $city)
        ->select('slot_time as time', 'charge')
        ->get();

    // fallback if no city found
    if ($slots->isEmpty()) {
        $slots = collect([
            ['label' => 'Afternoon', 'time' => '14:00–23:00', 'charge' => 35],
        ]);
    }

    return response()->json($slots);
}
}
