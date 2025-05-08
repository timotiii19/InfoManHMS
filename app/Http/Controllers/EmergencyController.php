<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Patient;
use App\Models\Nurse;
use App\Models\Doctor;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergencies = Emergency::with(['patient', 'nurse', 'doctor'])->get();
        return view('emergencies.index', compact('emergencies'));
    }

    public function create()
    {
        $patients = Patient::all();
        $nurses = Nurse::all();
        $doctors = Doctor::all();
        return view('emergencies.create', compact('patients', 'nurses', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'NurseID' => 'required|exists:nurses,NurseID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DateTime' => 'required|date',
            'EmergencyType' => 'required|string|max:100',
        ]);

        Emergency::create($request->all());

        return redirect()->route('emergencies.index');
    }

    public function edit(Emergency $emergency)
    {
        $patients = Patient::all();
        $nurses = Nurse::all();
        $doctors = Doctor::all();
        return view('emergencies.edit', compact('emergency', 'patients', 'nurses', 'doctors'));
    }

    public function update(Request $request, Emergency $emergency)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'NurseID' => 'required|exists:nurses,NurseID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DateTime' => 'required|date',
            'EmergencyType' => 'required|string|max:100',
        ]);

        $emergency->update($request->all());

        return redirect()->route('emergencies.index');
    }

    public function destroy(Emergency $emergency)
    {
        $emergency->delete();
        return redirect()->route('emergencies.index');
    }
}
