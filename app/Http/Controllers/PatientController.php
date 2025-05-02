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
        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}
