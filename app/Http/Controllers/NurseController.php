<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Department;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::with('department')->get();
        return view('nurses.index', compact('nurses'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('nurses.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'Email' => 'required|email|unique:nurses,Email|max:100',
            'Availability' => 'required|string|max:20',
            'ContactNumber' => 'required|string|max:15',
        ]);

        Nurse::create($request->all());

        return redirect()->route('nurses.index')->with('success', 'Nurse created successfully.');
    }

    public function edit($id)
    {
        $nurse = Nurse::findOrFail($id);
        $departments = Department::all();
        return view('nurses.edit', compact('nurse', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'Email' => 'required|email|max:100|unique:nurses,Email,' . $id . ',NurseID',
            'Availability' => 'required|string|max:20',
            'ContactNumber' => 'required|string|max:15',
        ]);

        $nurse = Nurse::findOrFail($id);
        $nurse->update($request->all());

        return redirect()->route('nurses.index')->with('success', 'Nurse updated successfully.');
    }

    public function destroy($id)
    {
        $nurse = Nurse::findOrFail($id);
        $nurse->delete();

        return redirect()->route('nurses.index')->with('success', 'Nurse deleted successfully.');
    }
}
