<?php

namespace App\Http\Controllers;

use App\Models\Outpatient;
use App\Models\Patient;
use Illuminate\Http\Request;

class OutpatientController extends Controller
{
    public function index()
    {
        $outpatients = Outpatient::with('patient')->get();
        return view('outpatients.index', compact('outpatients'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('outpatients.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'VisitDate' => 'required|date',
            'Diagnosis' => 'required|string',
            'Treatment' => 'required|string',
            'Doctor' => 'required|string',
        ]);

        Outpatient::create($validated);
        return redirect()->route('outpatients.index')->with('success', 'Outpatient added successfully.');
    }

    public function edit(Outpatient $outpatient)
    {
        $patients = Patient::all();
        return view('outpatients.edit', compact('outpatient', 'patients'));
    }

    public function update(Request $request, Outpatient $outpatient)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'VisitDate' => 'required|date',
            'Diagnosis' => 'required|string',
            'Treatment' => 'required|string',
            'Doctor' => 'required|string',
        ]);

        $outpatient->update($validated);
        return redirect()->route('outpatients.index')->with('success', 'Outpatient updated successfully.');
    }

    public function destroy(Outpatient $outpatient)
    {
        $outpatient->delete();
        return redirect()->route('outpatients.index')->with('success', 'Outpatient deleted successfully.');
    }
}
