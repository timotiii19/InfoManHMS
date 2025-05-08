@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Medication Record</h2>
    <form method="POST" action="{{ route('patient_medications.store') }}">
        @csrf
        @include('patient_medications.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
