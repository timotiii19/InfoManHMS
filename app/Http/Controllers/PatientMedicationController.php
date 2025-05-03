<?php

namespace App\Http\Controllers;

use App\Models\PatientMedication;
use App\Models\Patient;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PatientMedicationController extends Controller
{
    public function index()
    {
        $medications = PatientMedication::with(['patient', 'pharmacy'])->get();
        return view('patient_medications.index', compact('medications'));
    }

    public function create()
    {
        $patients = Patient::all();
        $pharmacies = Pharmacy::all();
        return view('patient_medications.create', compact('patients', 'pharmacies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'PharmacyID' => 'required|exists:pharmacies,PharmacyID',
            'Dosage' => 'required|string|max:100',
            'Frequency' => 'required|string|max:100',
            'Duration' => 'required|string|max:100',
        ]);

        PatientMedication::create($validated);
        return redirect()->route('patient_medications.index')->with('success', 'Patient Medication added.');
    }

    public function edit(PatientMedication $patient_medication)
    {
        $patients = Patient::all();
        $pharmacies = Pharmacy::all();
        return view('patient_medications.edit', compact('patient_medication', 'patients', 'pharmacies'));
    }

    public function update(Request $request, PatientMedication $patient_medication)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'PharmacyID' => 'required|exists:pharmacies,PharmacyID',
            'Dosage' => 'required|string|max:100',
            'Frequency' => 'required|string|max:100',
            'Duration' => 'required|string|max:100',
        ]);

        $patient_medication->update($validated);
        return redirect()->route('patient_medications.index')->with('success', 'Patient Medication updated.');
    }

    public function destroy(PatientMedication $patient_medication)
    {
        $patient_medication->delete();
        return redirect()->route('patient_medications.index')->with('success', 'Patient Medication deleted.');
    }
}
