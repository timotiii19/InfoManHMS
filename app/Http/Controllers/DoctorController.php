<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['department', 'location'])->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        $locations = Location::all();
        return view('doctors.create', compact('departments', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'DoctorName' => 'required|string|max:100',
            'Email' => 'required|email|unique:doctors',
            'Availability' => 'required|string|max:20',
            'ContactNumber' => 'required|string|max:15',
            'DoctorType' => 'required|in:Regular,Visiting',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'LocationID' => 'required|exists:locations,LocationID',
            'RoomType' => 'required|in:Ward,Private,Semi-Private',
        ]);

        Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        $locations = Location::all();
        return view('doctors.edit', compact('doctor', 'departments', 'locations'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'DoctorName' => 'required|string|max:100',
            'Email' => 'required|email|unique:doctors,Email,' . $doctor->DoctorID . ',DoctorID',
            'Availability' => 'required|string|max:20',
            'ContactNumber' => 'required|string|max:15',
            'DoctorType' => 'required|in:Regular,Visiting',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'LocationID' => 'required|exists:locations,LocationID',
            'RoomType' => 'required|in:Ward,Private,Semi-Private',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
