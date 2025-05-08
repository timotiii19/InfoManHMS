@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Create Appointment</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Department</th>
                <th>Visit Date</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->patient->FirstName }} {{ $appointment->patient->LastName }}</td>
                <td>{{ $appointment->doctor->FirstName }} {{ $appointment->doctor->LastName }}</td>
                <td>{{ $appointment->department->DepartmentName }}</td>
                <td>{{ $appointment->VisitDate }}</td>
                <td>{{ $appointment->Reason }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->OutpatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment->OutpatientID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
