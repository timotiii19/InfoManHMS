<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacists = Pharmacist::all(); // Retrieve all pharmacists
        return view('pharmacists.index', compact('pharmacists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_number' => 'required|string|max:15',
        ]);

        Pharmacist::create($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pharmacist = Pharmacist::findOrFail($id);
        return view('pharmacists.edit', compact('pharmacist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_number' => 'required|string|max:15',
        ]);

        $pharmacist = Pharmacist::findOrFail($id);
        $pharmacist->update($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pharmacist = Pharmacist::findOrFail($id);
        $pharmacist->delete();

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist deleted successfully.');
    }
}
