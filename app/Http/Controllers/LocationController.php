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
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'LocationName' => 'required|string|max:100',
            'RoomName' => 'required|string|max:50',
            'RoomType' => 'nullable|string|max:50',
            'Capacity' => 'nullable|integer',
            'Description' => 'nullable|string|max:255',
        ]);

        Location::create($validated);
        return redirect()->route('locations.index')->with('success', 'Location and room added successfully!');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'LocationName' => 'required|string|max:100',
            'RoomName' => 'required|string|max:50',
            'RoomType' => 'nullable|string|max:50',
            'Capacity' => 'nullable|integer',
            'Description' => 'nullable|string|max:255',
        ]);

        $location->update($validated);
        return redirect()->route('locations.index')->with('success', 'Location and room updated successfully!');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location and room deleted successfully!');
    }
}
