@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Patient</h2>
    <form method="POST" action="{{ route('patients.update', $patient->PatientID) }}">
        @csrf
        @method('PUT')

        @include('patients.form', ['patient' => $patient])

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
