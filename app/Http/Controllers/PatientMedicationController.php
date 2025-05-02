<?php

namespace App\Http\Controllers;

use App\Models\PatientMedication;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientMedicationController extends Controller
{
    public function index()
    {
        $medications = PatientMedication::all();
        return view('patient_medications.index', compact('medications'));
    }

    public function create()
    {
        $patients  = Patient::all();
        $medicines = Medicine::all();
        $doctors   = Doctor::all();
        return view('patient_medications.create', compact('patients','medicines','doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'medicine_id'  => 'required|exists:pharmacy,MedicineID',
            'doctor_id'    => 'required|exists:doctors,id',
            'dosage'       => 'required|string|max:50',
            'frequency'    => 'required|string|max:50',
            'StartDate'    => 'required|date',
            'EndDate'      => 'nullable|date|after_or_equal:StartDate',
        ]);

        PatientMedication::create($request->all());

        return redirect()
            ->route('patient_medications.index')
            ->with('success', 'Patient medication added.');
    }

    public function edit($id)
    {
        $medication = PatientMedication::findOrFail($id);
        $patients   = Patient::all();
        $medicines  = Medicine::all();
        $doctors    = Doctor::all();
        return view('patient_medications.edit', compact('medication','patients','medicines','doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'medicine_id'  => 'required|exists:pharmacy,MedicineID',
            'doctor_id'    => 'required|exists:doctors,id',
            'dosage'       => 'required|string|max:50',
            'frequency'    => 'required|string|max:50',
            'StartDate'    => 'required|date',
            'EndDate'      => 'nullable|date|after_or_equal:StartDate',
        ]);

        $medication = PatientMedication::findOrFail($id);
        $medication->update($request->all());

        return redirect()
            ->route('patient_medications.index')
            ->with('success', 'Patient medication updated.');
    }

    public function destroy($id)
    {
        PatientMedication::findOrFail($id)->delete();

        return redirect()
            ->route('patient_medications.index')
            ->with('success', 'Patient medication removed.');
    }
}
