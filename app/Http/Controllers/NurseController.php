<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::all();
        return view('nurses.index', compact('nurses'));
    }

    public function create()
    {
        return view('nurses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Gender' => 'required|string',
            'DateOfBirth' => 'required|date',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|email|unique:nurses,Email',
            'Address' => 'required|string',
            'Department' => 'required|string',
        ]);

        Nurse::create($validated);
        return redirect()->route('nurses.index')->with('success', 'Nurse added successfully.');
    }

    public function edit(Nurse $nurse)
    {
        return view('nurses.edit', compact('nurse'));
    }

    public function update(Request $request, Nurse $nurse)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Gender' => 'required|string',
            'DateOfBirth' => 'required|date',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|email|unique:nurses,Email,' . $nurse->NurseID . ',NurseID',
            'Address' => 'required|string',
            'Department' => 'required|string',
        ]);

        $nurse->update($validated);
        return redirect()->route('nurses.index')->with('success', 'Nurse updated successfully.');
    }

    public function destroy(Nurse $nurse)
    {
        $nurse->delete();
        return redirect()->route('nurses.index')->with('success', 'Nurse deleted successfully.');
    }
}
