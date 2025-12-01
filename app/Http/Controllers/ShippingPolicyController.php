<?php

namespace App\Http\Controllers;

use App\Models\ShippingPolicy;
use Illuminate\Http\Request;

class ShippingPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ShippingPolicy::all();
        return view('review_policies.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review_policies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

       $item = new ShippingPolicy();
       $item->description = $request->description;
       $item->save();

        return redirect()->route('shipping-policies.index')
            ->with('success', 'Shipping Policy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingPolicy $ShippingPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ShippingPolicy::find($id);
        return view('review_policies.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $item = ShippingPolicy::find($id);
        $item->description = $request->description;
        $item->save();

        return redirect()->route('shipping-policies.index')
            ->with('success', 'Shipping Policy updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = ShippingPolicy::find($id);
        $item->delete();

        return redirect()->route('shipping-policies.index')
            ->with('success', 'Shipping Policy deleted successfully.');
    }
}


