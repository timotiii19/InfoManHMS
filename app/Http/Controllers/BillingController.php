<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Patient;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    // Display a list of all patient billings
    public function index()
    {
        $billings = Billing::with('patient')->get();
        return view('billing.index', compact('billings'));
    }

    // Show form to create a new billing
    public function create()
    {
        $patients = Patient::all();
        return view('billing.create', compact('patients'));
    }

    // Store a new billing
    public function store(Request $request)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorFee' => 'required|numeric',
            'MedicineCost' => 'required|numeric',
            'PaymentDate' => 'required|date',
            'Receipt' => 'required|string|unique:patient_billing,Receipt',
        ]);

        Billing::create([
            'PatientID' => $request->PatientID,
            'DoctorFee' => $request->DoctorFee,
            'MedicineCost' => $request->MedicineCost,
            'PaymentDate' => $request->PaymentDate,
            'Receipt' => $request->Receipt,
        ]);

        return redirect()->route('billing.index')->with('success', 'Billing created successfully.');
    }

    // Show form to edit an existing billing
    public function edit($id)
    {
        $billing = Billing::findOrFail($id);
        $patients = Patient::all();
        return view('billing.edit', compact('billing', 'patients'));
    }

    // Update an existing billing
    public function update(Request $request, $id)
    {
        $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorFee' => 'required|numeric',
            'MedicineCost' => 'required|numeric',
            'PaymentDate' => 'required|date',
            'Receipt' => 'required|string|unique:patient_billing,Receipt,' . $id . ',BillingID',
        ]);

        $billing = Billing::findOrFail($id);
        $billing->update([
            'PatientID' => $request->PatientID,
            'DoctorFee' => $request->DoctorFee,
            'MedicineCost' => $request->MedicineCost,
            'PaymentDate' => $request->PaymentDate,
            'Receipt' => $request->Receipt,
        ]);

        return redirect()->route('billing.index')->with('success', 'Billing updated successfully.');
    }

    // Delete a billing
    public function destroy($id)
    {
        $billing = Billing::findOrFail($id);
        $billing->delete();
        return redirect()->route('billing.index')->with('success', 'Billing deleted successfully.');
    }
}
