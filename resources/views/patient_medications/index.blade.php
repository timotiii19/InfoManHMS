@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Patient Medications</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('patient_medications.create') }}" class="btn btn-primary mb-3">Add Medication</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Patient</th>
            <th>Medicine</th>
            <th>Doctor</th>
            <th>Dosage</th>
            <th>Frequency</th>
            <th>Start</th>
            <th>End</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medications as $med)
            <tr>
                <td>{{ $med->patient->name }}</td>
                <td>{{ $med->medicine->Description ?? $med->medicine->name }}</td>
                <td>{{ $med->doctor->DoctorName }}</td>
                <td>{{ $med->dosage }}</td>
                <td>{{ $med->frequency }}</td>
                <td>{{ $med->StartDate }}</td>
                <td>{{ $med->EndDate }}</td>
                <td>
                    <a href="{{ route('patient_medications.edit', $med->PatientMedicationID) }}"
                       class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('patient_medications.destroy', $med->PatientMedicationID) }}"
                          method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this record?')"
                                class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
