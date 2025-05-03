@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Patient Medication</h2>
    <form method="POST" action="{{ route('patient_medications.update', $patient_medication) }}">
        @csrf
        @method('PUT')
        @include('patient_medications.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
