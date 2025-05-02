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
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        $locations = Location::all();

        return view('inpatients.create', compact('patients', 'doctors', 'departments', 'locations'));
    }

    public function store(Request $request)
    {
        Inpatient::create($request->all());
        return redirect()->route('inpatients.index')->with('success', 'Inpatient record added!');
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
        $inpatient = Inpatient::findOrFail($id);
        $inpatient->update($request->all());
        return redirect()->route('inpatients.index')->with('success', 'Inpatient record updated!');
    }

    public function destroy($id)
    {
        Inpatient::destroy($id);
        return redirect()->route('inpatients.index')->with('success', 'Inpatient record deleted!');
    }
}
