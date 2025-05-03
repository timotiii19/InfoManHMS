@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Gender</th><th>DOB</th><th>Phone</th><th>Location</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->FirstName }} {{ $patient->LastName }}</td>
                <td>{{ $patient->Gender }}</td>
                <td>{{ $patient->DOB }}</td>
                <td>{{ $patient->Phone }}</td>
                <td>{{ $patient->location?->RoomNumber ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->PatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->PatientID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
