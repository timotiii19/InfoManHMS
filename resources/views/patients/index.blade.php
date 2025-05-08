@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patients List</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add New Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Sex</th>
                <th>Contact Number</th>
                <th>Patient Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->Name }}</td>
                <td>{{ $patient->DateOfBirth }}</td>
                <td>{{ $patient->Sex }}</td>
                <td>{{ $patient->ContactNumber }}</td>
                <td>{{ $patient->PatientType }}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->PatientID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->PatientID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
