<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashiers = Cashier::all(); // Get all cashiers
        return view('cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cashiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Cashier::create($request->all());

        return redirect()->route('cashiers.index')->with('success', 'Cashier added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cashier = Cashier::findOrFail($id);
        return view('cashiers.edit', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $cashier = Cashier::findOrFail($id);
        $cashier->update($request->all());

        return redirect()->route('cashiers.index')->with('success', 'Cashier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cashier = Cashier::findOrFail($id);
        $cashier->delete();

        return redirect()->route('cashiers.index')->with('success', 'Cashier deleted successfully.');
    }
}
