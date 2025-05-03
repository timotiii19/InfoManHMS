<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacy = Pharmacy::all(); // Example of fetching data
        return view('pharmacy.index', compact('pharmacy'));

    }

    public function create()
    {
        return view('pharmacy.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'MedicineName' => 'required|string|max:100',
            'Manufacturer' => 'nullable|string|max:100',
            'ExpirationDate' => 'required|date',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric|min:0',
        ]);

        Pharmacy::create($validated);
        return redirect()->route('pharmacy.index')->with('success', 'Medicine added.');
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacy.edit', compact('pharmacy'));
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        $validated = $request->validate([
            'MedicineName' => 'required|string|max:100',
            'Manufacturer' => 'nullable|string|max:100',
            'ExpirationDate' => 'required|date',
            'Quantity' => 'required|integer|min:0',
            'Price' => 'required|numeric|min:0',
        ]);

        $pharmacy->update($validated);
        return redirect()->route('pharmacy.index')->with('success', 'Medicine updated.');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect()->route('pharmacy.index')->with('success', 'Medicine deleted.');
    }
}
