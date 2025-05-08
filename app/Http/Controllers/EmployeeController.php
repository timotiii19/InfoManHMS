<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email|unique:employees,Email',
            'ContactNumber' => 'required',
            'EmployeeType' => 'required',
            'DepartmentID' => 'nullable|exists:departments,DepartmentID',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email|unique:employees,Email,' . $employee->EmployeeID . ',EmployeeID',
            'ContactNumber' => 'required',
            'EmployeeType' => 'required',
            'DepartmentID' => 'nullable|exists:departments,DepartmentID',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
