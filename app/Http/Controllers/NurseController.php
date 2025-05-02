<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Department;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nurses = Nurse::with('department')->get(); // Eager load department relation
        return view('nurses.index', compact('nurses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('nurses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:nurses,email',
            'department_id' => 'required|exists:departments,id',
            'availability' => 'required|string|max:50',
            'contact_number' => 'required|string|max:15',
        ]);

        Nurse::create($request->all());

        return redirect()->route('nurses.index')->with('success', 'Nurse created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nurse = Nurse::findOrFail($id);
        $departments = Department::all();
        return view('nurses.edit', compact('nurse', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:nurses,email,' . $id,
            'department_id' => 'required|exists:departments,id',
            'availability' => 'required|string|max:50',
            'contact_number' => 'required|string|max:15',
        ]);

        $nurse = Nurse::findOrFail($id);
        $nurse->update($request->all());

        return redirect()->route('nurses.index')->with('success', 'Nurse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nurse = Nurse::findOrFail($id);
        $nurse->delete();

        return redirect()->route('nurses.index')->with('success', 'Nurse deleted successfully.');
    }
}
