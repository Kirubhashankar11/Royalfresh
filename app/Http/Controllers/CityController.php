<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function setCity(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->city;

        // Save city
        session(['selected_city' => $city]);

        // Optional: set city_group for pricing
        $group = 'other';

        if (in_array($city, [
            'Dubai', 'Dubai Marina', 'Jumeirah',
            'Downtown Dubai', 'Deira', 'Bur Dubai', 'Al Barsha'
        ])) {
            $group = 'dubai';
        } elseif (in_array($city, [
            'Sharjah City', 'Al Majaz', 'Al Nahda', 'Muwaileh', 'Khor Fakkan',
            'Ajman City', 'Al Nuaimiya', 'Al Rashidiya', 'Mashrif', 'Al Jurf'
        ])) {
            $group = 'shj_ajm';
        }

        session(['city_group' => $group]);

        // 🔁 just go back to the same page
        return redirect()->back();
    }
}