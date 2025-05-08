<?php

namespace App\Http\Controllers;

use App\Models\Inpatient;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;

class InpatientController extends Controller
{
    public function index()
    {
        $inpatients = Inpatient::with(['patient', 'doctor', 'department', 'location'])->get();
        return view('inpatients.index', compact('inpatients'));
    }

        public function create()
        {
            // Pass the list of patients to the view
            $patients = Patient::all();
            $doctors = Doctor::all();
            $departments = Department::all();
            $locations = Location::all();
    
            return view('inpatients.create', compact('patients', 'doctors', 'departments', 'locations'));
        }

    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required',
            'DoctorID' => 'required',
            'DepartmentID' => 'required',
            'LocationID' => 'required',
            'Availability' => 'required|string|max:10',
            'MedicalRecord' => 'required|string',
        ]);

        Inpatient::create($request->all());

        return redirect()->route('inpatients.index')->with('success', 'Inpatient created successfully.');
    }

    public function edit($id)
    {
        $inpatient = Inpatient::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        $locations = Location::all();
        return view('inpatients.edit', compact('inpatient', 'patients', 'doctors', 'departments', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'PatientID' => 'required',
            'DoctorID' => 'required',
            'DepartmentID' => 'required',
            'LocationID' => 'required',
            'Availability' => 'required|string|max:10',
            'MedicalRecord' => 'required|string',
        ]);

        $inpatient = Inpatient::findOrFail($id);
        $inpatient->update($request->all());

        return redirect()->route('inpatients.index')->with('success', 'Inpatient updated successfully.');
    }

    public function destroy($id)
    {
        $inpatient = Inpatient::findOrFail($id);
        $inpatient->delete();

        return redirect()->route('inpatients.index')->with('success', 'Inpatient deleted successfully.');
    }
}
