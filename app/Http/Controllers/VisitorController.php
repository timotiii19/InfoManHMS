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
        $request->validate([
            'visitor_name' => 'required',
            'relation_to_patient' => 'required',
            'patient_id' => 'required|exists:patients,id',
            'visit_time' => 'required|date',
            'purpose' => 'nullable|string',
        ]);

        Visitor::create($request->all());
        return redirect()->route('visitors.index')->with('success', 'Visitor recorded.');
    }

    public function edit(Visitor $visitor)
    {
        $patients = Patient::all();
        return view('visitors.edit', compact('visitor', 'patients'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'visitor_name' => 'required',
            'relation_to_patient' => 'required',
            'patient_id' => 'required|exists:patients,id',
            'visit_time' => 'required|date',
            'purpose' => 'nullable|string',
        ]);

        $visitor->update($request->all());
        return redirect()->route('visitors.index')->with('success', 'Visitor updated.');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted.');
    }
}
