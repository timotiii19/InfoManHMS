<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Inpatient;
use App\Models\Outpatient;
use Illuminate\Http\Request;
use App\Models\Location;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function admit()
    {
        $locations = Location::where('Availability', 'Unoccupied')->get();
        return view('patients.admit', compact('locations'));
    }

    public function assign(Patient $patient)
        {
            return view('patients.assign', compact('patient'));
        }

        public function assignInpatient($patientId)
        {
            $patient = Patient::findOrFail($patientId);
            $patient->PatientType = 'Inpatient';
            $patient->save();

            return redirect()->route('patients.index')->with('success', 'Patient assigned as Inpatient.');
        }

        public function assignOutpatient($patientId)
        {
            $patient = Patient::findOrFail($patientId);
            $patient->PatientType = 'Outpatient';
            $patient->save();

            return redirect()->route('patients.index')->with('success', 'Patient assigned as Outpatient.');
        }


        public function storeAssignment(Request $request, $patientId)
        {
            $patient = Patient::findOrFail($patientId);

            if ($request->assignment_type === 'inpatient') {
                return redirect()->route('inpatients.create', ['patient' => $patient->PatientID]);
            } elseif ($request->assignment_type === 'outpatient') {
                return redirect()->route('outpatients.create', ['patient' => $patient->PatientID]);
            }

            return back()->withErrors('Invalid assignment type.');
        }

    public function create()
    {
        $locations = Location::where('Availability', 'Unoccupied')->get();
        return view('patients.create', compact('locations'));
    }

    

    /**
     * Admit a new patient.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FullName' => 'required|string|max:255',
            'DateOfBirth' => 'required|date',
            'Sex' => 'required|in:Male,Female',
            'Address' => 'required|string|max:255',
            'ContactNumber' => 'required|string|max:15',
            'PatientType' => 'required|in:Outpatient,Inpatient',
            'LocationID' => 'required_if:PatientType,Inpatient|exists:locations,LocationID', // Location is required only if Inpatient
        ]);

        $patient = new Patient();
        $patient->FullName = $request->FullName;
        $patient->DateOfBirth = $request->DateOfBirth;
        $patient->Sex = $request->Sex;
        $patient->Address = $request->Address;
        $patient->ContactNumber = $request->ContactNumber;
        $patient->PatientType = $request->PatientType;
        $patient->save();

        // Redirect to the next step based on patient type
        if ($request->PatientType === 'Inpatient') {
            return redirect()->route('inpatients.create', ['patientId' => $patient->PatientID]);
        } else {
            return redirect()->route('outpatients.create', ['patientId' => $patient->PatientID]);
        }
    }


    /**
     * Show the details of a specific patient.
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }
}
