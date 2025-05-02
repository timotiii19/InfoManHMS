@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Appointments</h3>
    @include('partials.back-to-dashboard')

    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add Appointment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appt)
            <tr>
                <td>{{ $appt->patient->name }}</td>
                <td>{{ $appt->doctor->DoctorName }}</td>
                <td>{{ $appt->appointment_date }}</td>
                <td>{{ $appt->appointment_time }}</td>
                <td>{{ $appt->status }}</td>
                <td>{{ $appt->notes }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appt->AppointmentID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('appointments.destroy', $appt->AppointmentID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this appointment?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
