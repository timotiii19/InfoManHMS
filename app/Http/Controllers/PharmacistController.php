<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    public function index()
    {
        $pharmacists = Pharmacist::all();
        return view('pharmacists.index', compact('pharmacists'));
    }

    public function create()
    {
        return view('pharmacists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:pharmacists',
            'PhoneNumber' => 'required|string|max:20',
        ]);

        Pharmacist::create($validated);
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist created successfully.');
    }

    public function edit(Pharmacist $pharmacist)
    {
        return view('pharmacists.edit', compact('pharmacist'));
    }

    public function update(Request $request, Pharmacist $pharmacist)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:pharmacists,Email,' . $pharmacist->PharmacistID . ',PharmacistID',
            'PhoneNumber' => 'required|string|max:20',
        ]);

        $pharmacist->update($validated);
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist updated successfully.');
    }

    public function destroy(Pharmacist $pharmacist)
    {
        $pharmacist->delete();
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist deleted successfully.');
    }
}
