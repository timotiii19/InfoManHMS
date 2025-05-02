<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'RoomType' => 'required|in:Ward,Private,Semi-Private',
            'RoomCapacity' => 'required|integer',
            'Availability' => 'required|in:Occupied,Unoccupied',
            'Building' => 'required|string|max:100',
            'Floor' => 'required|integer',
            'RoomNumber' => 'required|integer',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'RoomType' => 'required|in:Ward,Private,Semi-Private',
            'RoomCapacity' => 'required|integer',
            'Availability' => 'required|in:Occupied,Unoccupied',
            'Building' => 'required|string|max:100',
            'Floor' => 'required|integer',
            'RoomNumber' => 'required|integer',
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
