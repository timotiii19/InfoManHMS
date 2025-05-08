@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Today's Schedule for Dr. {{ $doctor->DoctorName }}</h3>

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
                <td>{{ $appt->patient->Name }}</td>
                <td>{{ \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No appointments for today.</p>
    @endif

    <a href="{{ route('doctors.index') }}" class="btn btn-secondary mt-3">Back to Doctors</a>
</div>
@endsection
