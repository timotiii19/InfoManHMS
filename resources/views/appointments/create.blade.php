@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Schedule Appointment</h3>
    @include('partials.back-to-dashboard')
    @include('appointments.form', ['route' => route('appointments.store'), 'method' => 'POST', 'appointment' => null])
</div>
@endsection
