<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::all();
        return view('billings.index', compact('billings'));
    }

    public function create()
    {
        return view('billings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'amount' => 'required|numeric',
            'billing_date' => 'required|date',
        ]);

        Billing::create($request->all());

        return redirect()->route('billings.index')->with('success', 'Billing added successfully.');
    }

    public function show(Billing $billing)
    {
        return view('billings.show', compact('billing'));
    }

    public function edit(Billing $billing)
    {
        return view('billings.edit', compact('billing'));
    }

    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'amount' => 'required|numeric',
            'billing_date' => 'required|date',
        ]);

        $billing->update($request->all());

        return redirect()->route('billings.index')->with('success', 'Billing updated.');
    }

    public function destroy(Billing $billing)
    {
        $billing->delete();

        return redirect()->route('billings.index')->with('success', 'Billing deleted.');
    }
}
