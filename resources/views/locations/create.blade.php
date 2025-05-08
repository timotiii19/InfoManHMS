@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Location</h2>
    <form method="POST" action="{{ route('locations.store') }}">
        @csrf
        @include('locations.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
