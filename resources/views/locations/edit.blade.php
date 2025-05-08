@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Location</h2>
    <form method="POST" action="{{ route('locations.update', $location->LocationID) }}">
        @csrf
        @method('PUT')
        @include('locations.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
