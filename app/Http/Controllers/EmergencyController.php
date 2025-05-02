<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Patient;
use App\Models\Nurse;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergencies = Emergency::with(['patient', 'nurse'])->get();
        return view('emergencies.index', compact('emergencies'));
    }

    public function create()
    {
        $patients = Patient::all();
        $nurses = Nurse::all();
        return view('emergencies.create', compact('patients', 'nurses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'emergency_time' => 'required|date',
        ]);

        Emergency::create($request->all());
        return redirect()->route('emergencies.index')->with('success', 'Emergency recorded.');
    }

    public function edit(Emergency $emergency)
    {
        $patients = Patient::all();
        $nurses = Nurse::all();
        return view('emergencies.edit', compact('emergency', 'patients', 'nurses'));
    }

    public function update(Request $request, Emergency $emergency)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'emergency_time' => 'required|date',
        ]);

        $emergency->update($request->all());
        return redirect()->route('emergencies.index')->with('success', 'Emergency updated.');
    }

    public function destroy(Emergency $emergency)
    {
        $emergency->delete();
        return redirect()->route('emergencies.index')->with('success', 'Emergency deleted.');
    }
}
