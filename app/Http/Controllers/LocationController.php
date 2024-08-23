<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // Reference the view inside the GetLocation folder
        return view('GetLocation.Home');
    }

    public function store(Request $request)
    {
        // Handle the form submission here
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        // Process the latitude and longitude data
        // For example, you could save it to the database or perform other actions

        return redirect()->route('location.index')->with('success', 'Location saved successfully!');
    }
}






























?>