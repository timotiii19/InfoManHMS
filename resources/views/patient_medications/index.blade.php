@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Medications</h2>
    <a href="{{ route('patient_medications.create') }}" class="btn btn-primary mb-3">Add Medication</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th><th>Medicine</th><th>Dosage</th><th>Frequency</th><th>Duration</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medications as $med)
            <tr>
                <td>{{ $med->patient->FirstName }} {{ $med->patient->LastName }}</td>
                <td>{{ $med->pharmacy->MedicineName }}</td>
                <td>{{ $med->Dosage }}</td>
                <td>{{ $med->Frequency }}</td>
                <td>{{ $med->Duration }}</td>
                <td>
                    <a href="{{ route('patient_medications.edit', $med) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('patient_medications.destroy', $med) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
