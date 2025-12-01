<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use Illuminate\Http\Request;

class BagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Bag::all();
        return view('bags.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $item = new Bag();
        $item->name = $request->name;
         if ($request->hasFile('image')) {
            $featured_image = $request->file('image');           
            $imageName1 = time() . '.' . $featured_image->getClientOriginalExtension();
            $featured_image->move(base_path('images/bag'), $imageName1);
            $item->image = $imageName1;
        }else{
            $item->image='';
        }

        $item->price = $request->price;
        $item->save();

        return redirect()->route('bags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bag $bag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Bag::find($id);
        return view('bags.edit', compact('item'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Bag::find($id);
        $item->name = $request->name;
         if ($request->hasFile('image')) {
            $featured_image = $request->file('image');           
            $imageName1 = time() . '.' . $featured_image->getClientOriginalExtension();
            $featured_image->move(base_path('images/bag'), $imageName1);
            $item->image = $imageName1;
        }
        $item->price = $request->price;
        $item->save();

        return redirect()->route('bags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Bag::find($id);
        $item->delete();
        return redirect()->route('bags.index');
    }
   
}
