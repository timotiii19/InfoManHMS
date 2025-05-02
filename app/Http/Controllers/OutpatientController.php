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

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('outpatients.create', compact('patients', 'doctors', 'departments'));
    }

    public function store(Request $request)
    {
        Outpatient::create($request->all());
        return redirect()->route('outpatients.index')->with('success', 'Outpatient added!');
    }

    public function edit($id)
    {
        $outpatient = Outpatient::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('outpatients.edit', compact('outpatient', 'patients', 'doctors', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $outpatient = Outpatient::findOrFail($id);
        $outpatient->update($request->all());
        return redirect()->route('outpatients.index')->with('success', 'Outpatient updated!');
    }

    public function destroy($id)
    {
        Outpatient::destroy($id);
        return redirect()->route('outpatients.index')->with('success', 'Outpatient deleted!');
    }
}
