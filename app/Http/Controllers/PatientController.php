<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'DateOfBirth' => 'required|date',
            'Sex' => 'required|in:Male,Female',
            'Address' => 'required|string|max:255',
            'ContactNumber' => 'required|string|max:15',
            'PatientType' => 'required|in:Outpatient,Inpatient',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'DateOfBirth' => 'required|date',
            'Sex' => 'required|in:Male,Female',
            'Address' => 'required|string|max:255',
            'ContactNumber' => 'required|string|max:15',
            'PatientType' => 'required|in:Outpatient,Inpatient',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
