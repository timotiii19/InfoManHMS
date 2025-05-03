<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        $cashiers = Cashier::all();
        return view('cashiers.index', compact('cashiers'));
    }

    public function create()
    {
        return view('cashiers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:cashiers',
            'PhoneNumber' => 'required|string|max:20',
        ]);

        Cashier::create($validated);
        return redirect()->route('cashiers.index')->with('success', 'Cashier created successfully.');
    }

    public function edit(Cashier $cashier)
    {
        return view('cashiers.edit', compact('cashier'));
    }

    public function update(Request $request, Cashier $cashier)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:cashiers,Email,' . $cashier->CashierID . ',CashierID',
            'PhoneNumber' => 'required|string|max:20',
        ]);

        $cashier->update($validated);
        return redirect()->route('cashiers.index')->with('success', 'Cashier updated successfully.');
    }

    public function destroy(Cashier $cashier)
    {
        $cashier->delete();
        return redirect()->route('cashiers.index')->with('success', 'Cashier deleted successfully.');
    }
}
