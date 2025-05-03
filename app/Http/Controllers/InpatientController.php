<?php

namespace App\Http\Controllers;

use App\Models\Inpatient;
use App\Models\Patient;
use Illuminate\Http\Request;

class InpatientController extends Controller
{
    public function index()
    {
        $inpatients = Inpatient::with('patient')->get();
        return view('inpatients.index', compact('inpatients'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('inpatients.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'AdmissionDate' => 'required|date',
            'DischargeDate' => 'nullable|date|after_or_equal:AdmissionDate',
            'Diagnosis' => 'required|string',
            'Treatment' => 'required|string',
            'Doctor' => 'required|string',
        ]);

        Inpatient::create($validated);
        return redirect()->route('inpatients.index')->with('success', 'Inpatient added successfully.');
    }

    public function edit(Inpatient $inpatient)
    {
        $patients = Patient::all();
        return view('inpatients.edit', compact('inpatient', 'patients'));
    }

    public function update(Request $request, Inpatient $inpatient)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'AdmissionDate' => 'required|date',
            'DischargeDate' => 'nullable|date|after_or_equal:AdmissionDate',
            'Diagnosis' => 'required|string',
            'Treatment' => 'required|string',
            'Doctor' => 'required|string',
        ]);

        $inpatient->update($validated);
        return redirect()->route('inpatients.index')->with('success', 'Inpatient updated successfully.');
    }

    public function destroy(Inpatient $inpatient)
    {
        $inpatient->delete();
        return redirect()->route('inpatients.index')->with('success', 'Inpatient deleted successfully.');
    }
}
