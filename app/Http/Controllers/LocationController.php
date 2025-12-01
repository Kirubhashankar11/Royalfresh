<?php
namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        // Example list for multi-select options
        $availableLocations = ['Dubai', 'Sharjah', 'Ajman', 'Abu Dhabi', 'Al Ain', 'Fujairah', 'Ras Al Khaimah', 'Umm Al Quwain'];
        return view('locations.create', compact('availableLocations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|array|min:1',
        ]);

        Location::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully!');
    }
    public function edit($id)
{
    $location = Location::findOrFail($id);
    $availableLocations = ['Dubai', 'Sharjah ', 'Ajman', 'Abu Dhabi', 'Al Ain','Fujairah','Ras Al Khaimah','Umm Al Quwain'];
    return view('locations.edit', compact('location', 'availableLocations'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|array|min:1',
    ]);

    $location = Location::findOrFail($id);
    $location->update([
        'name' => $request->name,
        'location' => $request->location,
    ]);

    return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
}


    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
}
