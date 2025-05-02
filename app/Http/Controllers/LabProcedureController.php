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
        $labprocedures = LabProcedure::with(['patient', 'doctor'])->get();
        return view('labprocedures.index', compact('labprocedures'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('labprocedures.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        LabProcedure::create($request->all());
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure recorded!');
    }

    public function edit($id)
    {
        $labprocedure = LabProcedure::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('labprocedures.edit', compact('labprocedure', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $labprocedure = LabProcedure::findOrFail($id);
        $labprocedure->update($request->all());
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure updated!');
    }

    public function destroy($id)
    {
        LabProcedure::destroy($id);
        return redirect()->route('labprocedures.index')->with('success', 'Lab procedure deleted!');
    }
}
