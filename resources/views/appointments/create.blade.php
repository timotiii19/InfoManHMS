@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Appointment</h2>
    <form method="POST" action="{{ route('appointments.store') }}">@csrf
        @include('appointments.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
