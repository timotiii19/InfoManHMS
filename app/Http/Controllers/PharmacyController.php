<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Pharmacist;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::with('pharmacist')->get();
        return view('pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $pharmacists = Pharmacist::all();
        return view('pharmacies.create', compact('pharmacists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PharmacistID' => 'required|exists:pharmacists,PharmacistID',
            'Description' => 'required',
            'StockQuantity' => 'required|integer',
            'Price' => 'required|numeric|min:0.01',
        ]);

        Pharmacy::create($request->all());
        return redirect()->route('pharmacies.index')->with('success', 'Medicine added successfully');
    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacists = Pharmacist::all();
        return view('pharmacies.edit', compact('pharmacy', 'pharmacists'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'PharmacistID' => 'required|exists:pharmacists,PharmacistID',
            'Description' => 'required',
            'StockQuantity' => 'required|integer',
            'Price' => 'required|numeric|min:0.01',
        ]);

        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($request->all());

        return redirect()->route('pharmacies.index')->with('success', 'Medicine updated successfully');
    }

    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->delete();

        return redirect()->route('pharmacies.index')->with('success', 'Medicine deleted successfully');
    }
}
