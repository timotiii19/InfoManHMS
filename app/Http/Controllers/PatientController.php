<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of all patients.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form to admit a new patient.
     */
    public function admit()
    {
        $locations = Location::where('Availability', 'Unoccupied')->get();
        return view('patients.admit', compact('locations'));
    }

    /**
     * Admit a new patient.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FullName' => 'required|string|max:255',
            'DateOfBirth' => 'required|date',
            'Sex' => 'required|in:Male,Female',
            'Address' => 'required|string|max:255',
            'ContactNumber' => 'required|string|max:15',
            'PatientType' => 'required|in:Outpatient,Inpatient',
            'LocationID' => 'required|exists:locations,LocationID',
        ]);

        $patient = new Patient();
        $patient->fill($request->all());
        $patient->save();

        // Mark the room as occupied
        $location = Location::find($request->LocationID);
        $location->Availability = 'Occupied';
        $location->save();

        return redirect()->route('patients.index')->with('success', 'Patient admitted successfully');
    }

    /**
     * Show the details of a specific patient.
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }
}
