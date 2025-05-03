@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Appointment</h2>
    <form method="POST" action="{{ route('appointments.update', $appointment) }}">
        @csrf @method('PUT')
        @include('appointments.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
