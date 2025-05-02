<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $medicines = Pharmacy::all();
        return view('pharmacy.index', compact('medicines'));
    }

    public function create()
    {
        return view('pharmacy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required',
            'manufacturer' => 'required',
            'batch_no' => 'nullable|string',
            'quantity' => 'required|integer',
            'unit' => 'required',
            'expiry_date' => 'required|date',
            'price' => 'required|numeric',
        ]);

        Pharmacy::create($request->all());
        return redirect()->route('pharmacy.index')->with('success', 'Medicine added.');
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacy.edit', compact('pharmacy'));
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        $request->validate([
            'medicine_name' => 'required',
            'manufacturer' => 'required',
            'batch_no' => 'nullable|string',
            'quantity' => 'required|integer',
            'unit' => 'required',
            'expiry_date' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $pharmacy->update($request->all());
        return redirect()->route('pharmacy.index')->with('success', 'Medicine updated.');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect()->route('pharmacy.index')->with('success', 'Medicine removed.');
    }
}

