<?php

namespace App\Http\Controllers;

use App\Models\LabProcedure;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class LabProcedureController extends Controller
{
    public function index()
    {
        $labProcedures = LabProcedure::with(['patient', 'doctor'])->get();
        return view('lab_procedures.index', compact('labProcedures'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('lab_procedures.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required',
            'DoctorID' => 'required',
            'TestDate' => 'required|date',
            'Result' => 'required',
            'DateReleased' => 'required|date',
        ]);

        LabProcedure::create($request->all());

        return redirect()->route('lab_procedures.index')->with('success', 'Lab procedure created successfully.');
    }

    public function edit($id)
    {
        $labProcedure = LabProcedure::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('lab_procedures.edit', compact('labProcedure', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'PatientID' => 'required',
            'DoctorID' => 'required',
            'TestDate' => 'required|date',
            'Result' => 'required',
            'DateReleased' => 'required|date',
        ]);

        $labProcedure = LabProcedure::findOrFail($id);
        $labProcedure->update($request->all());

        return redirect()->route('lab_procedures.index')->with('success', 'Lab procedure updated successfully.');
    }

    public function destroy($id)
    {
        $labProcedure = LabProcedure::findOrFail($id);
        $labProcedure->delete();

        return redirect()->route('lab_procedures.index')->with('success', 'Lab procedure deleted successfully.');
    }
}
