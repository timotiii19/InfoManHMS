@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Emergency</h2>
    <form method="POST" action="{{ route('emergencies.update', $emergency->EmergencyID) }}">
        @csrf
        @method('PUT')
        @include('emergencies.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
