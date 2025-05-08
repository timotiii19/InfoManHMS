<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Display a listing of the appointments
    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor', 'department')->get();
        return view('appointments.index', compact('appointments'));
    }

    // Show the form to create a new appointment
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('appointments.create', compact('patients', 'doctors', 'departments'));
    }

    // Store a newly created appointment
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'VisitDate' => 'required|date',
            'Reason' => 'nullable|string',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    // Show the form to edit an existing appointment
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();

        return view('appointments.edit', compact('appointment', 'patients', 'doctors', 'departments'));
    }

    // Update the specified appointment
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'VisitDate' => 'required|date',
            'Reason' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    // Delete the specified appointment
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
