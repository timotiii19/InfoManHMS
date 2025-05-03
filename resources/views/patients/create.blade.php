@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Patient</h2>
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        @include('patients.form')

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
