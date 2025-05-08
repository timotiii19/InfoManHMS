<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display a list of all departments
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    // Show the form to create a new department
    public function create()
    {
        return view('department.create');
    }

    // Store a new department
    public function store(Request $request)
    {
        $request->validate([
            'DepartmentName' => 'required|string|max:100',
            'DepartmentRoom' => 'required|string|max:50',
        ]);

        Department::create([
            'DepartmentName' => $request->DepartmentName,
            'DepartmentRoom' => $request->DepartmentRoom,
        ]);

        return redirect()->route('department.index')->with('success', 'Department added successfully.');
    }

    // Show the form to edit an existing department
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    // Update an existing department
    public function update(Request $request, $id)
    {
        $request->validate([
            'DepartmentName' => 'required|string|max:100',
            'DepartmentRoom' => 'required|string|max:50',
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'DepartmentName' => $request->DepartmentName,
            'DepartmentRoom' => $request->DepartmentRoom,
        ]);

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    // Delete a department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
