<!-- resources/views/inpatients/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inpatients</h2>
    <a href="{{ route('inpatients.create') }}" class="btn btn-primary mb-3">Create Inpatient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inpatients as $inpatient)
            <tr>
                <td>{{ $inpatient->patient->FullName }}</td>  <!-- Display Patient Full Name -->
                <td>{{ $inpatient->doctor->FullName }}</td>   <!-- Display Doctor Full Name -->
                <td>{{ $inpatient->department->DepartmentName }}</td>
                <td>{{ $inpatient->location->LocationName }}</td>
                <td>{{ $inpatient->Availability }}</td>
                <td>
                    <a href="{{ route('inpatients.edit', $inpatient->InpatientID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inpatients.destroy', $inpatient->InpatientID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this inpatient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
