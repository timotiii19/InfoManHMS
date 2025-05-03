<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Patient;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::with('patient')->get();
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('visitors.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'VisitDate' => 'required|date',
            'VisitTime' => 'required',
            'PatientID' => 'required|exists:patients,PatientID',
        ]);

        Visitor::create($validated);
        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully.');
    }

    public function edit(Visitor $visitor)
    {
        $patients = Patient::all();
        return view('visitors.edit', compact('visitor', 'patients'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'VisitDate' => 'required|date',
            'VisitTime' => 'required',
            'PatientID' => 'required|exists:patients,PatientID',
        ]);

        $visitor->update($validated);
        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully.');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully.');
    }
}
