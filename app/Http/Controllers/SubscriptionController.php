<?php

// app/Http/Controllers/SubscriptionController.php
namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $milkVarieties = ['cow', 'buffalo', 'goat', 'camel'];
        $cities = ['Dubai', 'Sharjah', 'Ajman', 'Abu Dhabi', 'Al Ain', 'Fujairah', 'Ras Al Khaimah', 'Umm Al Quwain'];
        return view('subscriptions.create', compact('milkVarieties', 'cities'));
    }

    public function store(Request $request)
    {
        $item = Subscription::create([
            'subscription' => $request->subscription,
            'city' => $request->city,
            'milk_variety' => $request->milk_variety,
            'unit_1l_price' => $request->unit_1l_price,
            'unit_1_5l_price' => $request->unit_1_5l_price,
            'unit_500g_price' => $request->unit_500g_price,
            'unit_1kg_price' => $request->unit_1kg_price,
        ]);

        return redirect('/subscriptions-list')->with('success', 'Subscription added successfully.');
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $milkVarieties = ['cow', 'buffalo', 'goat', 'camel'];
        $cities = ['Dubai', 'Sharjah', 'Ajman', 'Abu Dhabi', 'Al Ain', 'Fujairah', 'Ras Al Khaimah', 'Umm Al Quwain'];
        return view('subscriptions.edit', compact('subscription', 'milkVarieties', 'cities'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
      $item = Subscription::findOrFail($id);
      $item->update([
          'subscription' => $request->subscription,
          'city' => $request->city,
          'milk_variety' => $request->milk_variety,
          'unit_1l_price' => $request->unit_1l_price,
          'unit_1_5l_price' => $request->unit_1_5l_price,
          'unit_500g_price' => $request->unit_500g_price,
          'unit_1kg_price' => $request->unit_1kg_price,
      ]);

        return redirect('/subscriptions-list')->with('success', 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect('/subscriptions-list')->with('success', 'Subscription deleted successfully.');
    }

   public function getPrice(Request $request)
{
    $city = $request->query('city');
    $milkType = $request->query('milk_type');
    $unit = $request->query('unit');

    // Find matching subscription record
    $priceRecord = Subscription::where('subscription', 'milk')
        ->where('city', $city)
        ->where('milk_variety', $milkType)
        ->first();

    if (!$priceRecord) {
        return response()->json([
            'success' => false,
            'message' => 'No record found for this city and milk type.',
        ]);
    }

    // Determine which price column to use
    $price = null;
    if ($unit === '1L') {
        $price = $priceRecord->unit_1l_price;
    } elseif ($unit === '1.5L') {
        $price = $priceRecord->unit_1_5l_price;
    }

    if ($price) {
        return response()->json([
            'success' => true,
            'price' => $price,
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Price not found for the selected unit.',
        ]);
    }
}
public function getYogurtPrice(Request $request)
{
    // dd($request->all());
    $city = $request->query('city');
    $yogurtType = $request->query('yogurt_type');
    $unit = $request->query('unit');

    // Find matching subscription record
    $priceRecord = Subscription::where('subscription', 'yogurt')
        ->where('city', $city)
        ->where('milk_variety', $yogurtType)
        ->first();
        // dd($priceRecord);

    if (!$priceRecord) {
        return response()->json([
            'success' => false,
            'message' => 'No record found for this city and milk type.',
        ]);
    }

    // Determine which price column to use
    $price = null;
    if ($unit === '1KG') {
        $price = $priceRecord->unit_1kg_price;
    } elseif ($unit === '500g') {
        $price = $priceRecord->unit_500g_price;
    }

    if ($price) {
        return response()->json([
            'success' => true,
            'price' => $price,
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Price not found for the selected unit.',
        ]);
    }
}

public function getCityTimeSlots($city)
{
    $timeSlots = DB::table('delivery_times')
        ->where('city', $city)
        ->select('id', 'time', 'charge')
        ->get();
        // Example columns: time_label = 'Morning', time_range = '05:30–10:00'
// dd($timeSlots);
    return response()->json($timeSlots);
}

}
