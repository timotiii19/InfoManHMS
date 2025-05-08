<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Patient;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display all locations.
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form to create a new location.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a new location.
     */
    public function store(Request $request)
    {
        $request->validate([
            'RoomType' => 'required',
            'RoomCapacity' => 'required|integer',
            'Availability' => 'required',
            'Building' => 'required|string|max:100',
            'Floor' => 'required|integer',
            'RoomNumber' => 'required|integer',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    /**
     * Show the form to edit an existing location.
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Update a location.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'RoomType' => 'required',
            'RoomCapacity' => 'required|integer',
            'Availability' => 'required',
            'Building' => 'required|string|max:100',
            'Floor' => 'required|integer',
            'RoomNumber' => 'required|integer',
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Delete a location.
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }

    /**
     * Assign a patient to a location (room).
     */
    public function assignPatientToLocation(Request $request, $locationId)
    {
        $location = Location::findOrFail($locationId);

        if ($location->Availability === 'Occupied') {
            return redirect()->back()->with('error', 'Room is already occupied');
        }

        $patient = Patient::findOrFail($request->patient_id);
        $patient->LocationID = $locationId;
        $patient->save();

        $location->Availability = 'Occupied';
        $location->save();

        return redirect()->route('patients.index')->with('success', 'Patient has been assigned to the room');
    }
}
