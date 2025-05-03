<?php

namespace App\Http\Controllers;

use App\Models\LabProcedure;
use App\Models\Patient;
use Illuminate\Http\Request;

class LabProcedureController extends Controller
{
    public function index()
    {
        $labprocedures = LabProcedure::with('patient')->get();
        return view('labprocedures.index', compact('labprocedures'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('labprocedures.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'ProcedureType' => 'required|string|max:100',
            'ProcedureDate' => 'required|date',
            'Results' => 'nullable|string',
        ]);

        LabProcedure::create($validated);
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure added successfully!');
    }

    public function edit(LabProcedure $labprocedure)
    {
        $patients = Patient::all();
        return view('labprocedures.edit', compact('labprocedure', 'patients'));
    }

    public function update(Request $request, LabProcedure $labprocedure)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'ProcedureType' => 'required|string|max:100',
            'ProcedureDate' => 'required|date',
            'Results' => 'nullable|string',
        ]);

        $labprocedure->update($validated);
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure updated successfully!');
    }

    public function destroy(LabProcedure $labprocedure)
    {
        $labprocedure->delete();
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure deleted successfully!');
    }
}
