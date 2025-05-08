@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Medications</h2>
    <a href="{{ route('patient_medications.create') }}" class="btn btn-primary mb-3">Create Medication Record</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Medicine</th>
                <th>Doctor</th>
                <th>Dosage</th>
                <th>Frequency</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patientMedications as $medication)
            <tr>
                <td>{{ $medication->patient->FullName }}</td>
                <td>{{ $medication->medicine->MedicineName }}</td>
                <td>{{ $medication->doctor->FullName }}</td>
                <td>{{ $medication->Dosage }}</td>
                <td>{{ $medication->Frequency }}</td>
                <td>{{ $medication->StartDate }}</td>
                <td>{{ $medication->EndDate }}</td>
                <td>
                    <a href="{{ route('patient_medications.edit', $medication->PatientMedicationID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('patient_medications.destroy', $medication->PatientMedicationID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this medication record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
