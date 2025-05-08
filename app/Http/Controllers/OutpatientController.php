<?php

namespace App\Http\Controllers;

use App\Models\Outpatient;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class OutpatientController extends Controller
{
    public function index()
    {
        $outpatients = Outpatient::with(['patient', 'doctor', 'department'])->get();
        return view('outpatients.index', compact('outpatients'));
    }

    public function create($patientId)
    {
        // Retrieve the patient by ID
        $patient = Patient::findOrFail($patientId);
        
        // Retrieve all necessary data for the view
        $doctors = Doctor::all();
        $departments = Department::all();
        
        // Return the view and pass the patient data
        return view('outpatients.create', compact('patient', 'doctors', 'departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'VisitDate' => 'required|date',
            'Reason' => 'required|string|max:255',
        ]);

        Outpatient::create($request->all());

        return redirect()->route('outpatients.index')->with('success', 'Outpatient created successfully.');
    }

    public function edit($id)
    {
        $outpatient = Outpatient::findOrFail($id);
        $patients = Patient::all(); // Get all patients
        $doctors = Doctor::all();   // Get all doctors
        $departments = Department::all(); // Get all departments

        return view('outpatients.edit', compact('outpatient', 'patients', 'doctors', 'departments'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'VisitDate' => 'required|date',
            'Reason' => 'required|string|max:255',
        ]);

        $outpatient = Outpatient::findOrFail($id);
        $outpatient->update($request->all());

        return redirect()->route('outpatients.index')->with('success', 'Outpatient updated successfully.');
    }

    public function destroy($id)
    {
        $outpatient = Outpatient::findOrFail($id);
        $outpatient->delete();

        return redirect()->route('outpatients.index')->with('success', 'Outpatient deleted successfully.');
    }
}
