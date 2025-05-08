@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Emergency</h2>
    <form method="POST" action="{{ route('emergencies.store') }}">
        @csrf
        @include('emergencies.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
