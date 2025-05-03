@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Today's Schedule for Dr. {{ $doctor->name }}</h3>

    @if($appointments->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appt)
            <tr>
                <td>{{ $appt->patient->name }}</td>
                <td>{{ \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No appointments for today.</p>
    @endif
</div>
@endsection
