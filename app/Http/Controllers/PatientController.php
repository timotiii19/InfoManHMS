<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Location;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('location')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('patients.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Gender' => 'required',
            'DOB' => 'required|date',
            'Phone' => 'nullable|string',
            'Email' => 'nullable|email',
            'Address' => 'nullable|string',
            'LocationID' => 'nullable|exists:locations,LocationID',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $locations = Location::all();
        return view('patients.edit', compact('patient', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Gender' => 'required',
            'DOB' => 'required|date',
            'Phone' => 'nullable|string',
            'Email' => 'nullable|email',
            'Address' => 'nullable|string',
            'LocationID' => 'nullable|exists:locations,LocationID',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
