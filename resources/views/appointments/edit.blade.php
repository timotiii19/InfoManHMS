@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Appointment</h3>
    @include('partials.back-to-dashboard')
    @include('appointments.form', [
        'route' => route('appointments.update', $appointment->AppointmentID),
        'method' => 'PUT',
        'appointment' => $appointment
    ])
</div>
@endsection
