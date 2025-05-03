@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add Appointment</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->patient->FirstName }} {{ $appointment->patient->LastName }}</td>
                <td>{{ $appointment->doctor->DoctorName }}</td>
                <td>{{ $appointment->AppointmentDate }}</td>
                <td>{{ $appointment->AppointmentTime }}</td>
                <td>{{ $appointment->Status }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->AppointmentID) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('appointments.destroy', $appointment->AppointmentID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
