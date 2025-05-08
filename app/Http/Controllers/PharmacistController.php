<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    // Display a listing of pharmacists
    public function index()
    {
        $pharmacists = Pharmacist::all();
        return view('pharmacists.index', compact('pharmacists'));
    }

    // Show the form for creating a new pharmacist
    public function create()
    {
        return view('pharmacists.create');
    }

    // Store a newly created pharmacist in storage
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:100',
            'ContactNumber' => 'required|max:15',
        ]);

        Pharmacist::create($request->all());
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist added successfully');
    }

    // Show the form for editing the specified pharmacist
    public function edit($id)
    {
        $pharmacist = Pharmacist::findOrFail($id);
        return view('pharmacists.edit', compact('pharmacist'));
    }

    // Update the specified pharmacist in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|max:100',
            'ContactNumber' => 'required|max:15',
        ]);

        $pharmacist = Pharmacist::findOrFail($id);
        $pharmacist->update($request->all());
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist updated successfully');
    }

    // Remove the specified pharmacist from storage
    public function destroy($id)
    {
        $pharmacist = Pharmacist::findOrFail($id);
        $pharmacist->delete();
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist deleted successfully');
    }
}
