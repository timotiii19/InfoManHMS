<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Patient;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::with('patient')->get(); // Eager load the patient data
        return view('billing.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        return view('billing.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_fee' => 'required|numeric',
            'medicine_cost' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'receipt' => 'required|string|max:255',
        ]);

        Billing::create($request->all());

        return redirect()->route('billing.index')->with('success', 'Billing record created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $billing = Billing::findOrFail($id);
        $patients = Patient::all();
        return view('billing.edit', compact('billing', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_fee' => 'required|numeric',
            'medicine_cost' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'receipt' => 'required|string|max:255',
        ]);

        $billing = Billing::findOrFail($id);
        $billing->update($request->all());

        return redirect()->route('billing.index')->with('success', 'Billing record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $billing = Billing::findOrFail($id);
        $billing->delete();

        return redirect()->route('billing.index')->with('success', 'Billing record deleted successfully.');
    }
}
