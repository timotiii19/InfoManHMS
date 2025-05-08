<?php

namespace App\Http\Controllers;

use App\Models\PatientMedication;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientMedicationController extends Controller
{
    public function index()
    {
        $patientMedications = PatientMedication::with(['patient', 'medicine', 'doctor'])->get();
        return view('patient_medications.index', compact('patientMedications'));
    }

    public function create()
    {
        $patients = Patient::all();
        $medicines = Pharmacy::all();
        $doctors = Doctor::all();
        return view('patient_medications.create', compact('patients', 'medicines', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'MedicineID' => 'required|exists:pharmacies,MedicineID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'Dosage' => 'required|string|max:50',
            'Frequency' => 'required|string|max:50',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
        ]);

        PatientMedication::create($request->all());

        return redirect()->route('patient_medications.index')->with('success', 'Medication record created successfully.');
    }

    public function edit($id)
    {
        $patientMedication = PatientMedication::findOrFail($id);
        $patients = Patient::all();
        $medicines = Pharmacy::all();
        $doctors = Doctor::all();
        return view('patient_medications.edit', compact('patientMedication', 'patients', 'medicines', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'MedicineID' => 'required|exists:pharmacies,MedicineID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'Dosage' => 'required|string|max:50',
            'Frequency' => 'required|string|max:50',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
        ]);

        $patientMedication = PatientMedication::findOrFail($id);
        $patientMedication->update($request->all());

        return redirect()->route('patient_medications.index')->with('success', 'Medication record updated successfully.');
    }

    public function destroy($id)
    {
        $patientMedication = PatientMedication::findOrFail($id);
        $patientMedication->delete();

        return redirect()->route('patient_medications.index')->with('success', 'Medication record deleted successfully.');
    }
}
