<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,PatientID',
            'doctor_id' => 'required|exists:doctors,DoctorID',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,PatientID',
            'doctor_id' => 'required|exists:doctors,DoctorID',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
