<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Patient;
use App\Models\Location;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::with('patient', 'location')->get();  // Load related patient and location
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        $patients = Patient::all();  // Get all patients
        $locations = Location::all();  // Get all locations
        return view('visitors.create', compact('patients', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'VisitorName' => 'required|max:100',
            'Relationship' => 'required|max:50',
            'VisitDateTime' => 'required|date',
            'LocationID' => 'required|exists:locations,LocationID',
            'ContactNumber' => 'required|max:15',
        ]);

        Visitor::create($validated);

        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully');
    }

    public function edit(Visitor $visitor)
    {
        $patients = Patient::all();
        $locations = Location::all();
        return view('visitors.edit', compact('visitor', 'patients', 'locations'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'VisitorName' => 'required|max:100',
            'Relationship' => 'required|max:50',
            'VisitDateTime' => 'required|date',
            'LocationID' => 'required|exists:locations,LocationID',
            'ContactNumber' => 'required|max:15',
        ]);

        $visitor->update($validated);

        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully');
    }
}
