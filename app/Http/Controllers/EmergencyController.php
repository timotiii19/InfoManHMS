<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Patient;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergencies = Emergency::with('patient')->get();
        return view('emergencies.index', compact('emergencies'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('emergencies.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'Condition' => 'required|string|max:255',
            'ArrivalTime' => 'required|date',
            'ActionsTaken' => 'nullable|string',
        ]);

        Emergency::create($validated);
        return redirect()->route('emergencies.index')->with('success', 'Emergency record created.');
    }

    public function edit(Emergency $emergency)
    {
        $patients = Patient::all();
        return view('emergencies.edit', compact('emergency', 'patients'));
    }

    public function update(Request $request, Emergency $emergency)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'Condition' => 'required|string|max:255',
            'ArrivalTime' => 'required|date',
            'ActionsTaken' => 'nullable|string',
        ]);

        $emergency->update($validated);
        return redirect()->route('emergencies.index')->with('success', 'Emergency record updated.');
    }

    public function destroy(Emergency $emergency)
    {
        $emergency->delete();
        return redirect()->route('emergencies.index')->with('success', 'Emergency record deleted.');
    }
}
