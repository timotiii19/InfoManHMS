@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Daily Appointments Report - {{ $date }}</h3>

    <form method="GET" class="mb-3">
        <label>Choose Date:</label>
        <input type="date" name="date" value="{{ $date }}" class="form-control" onchange="this.form.submit()">
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($appointments as $appt)
            <tr>
                <td>{{ $appt->patient->name }}</td>
                <td>{{ $appt->doctor->name }}</td>
                <td>{{ $appt->appointment_time }}</td>
            </tr>
            @empty
            <tr><td colspan="3">No appointments found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
