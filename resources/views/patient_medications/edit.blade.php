@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Medication Record</h2>
    <form method="POST" action="{{ route('patient_medications.update', $patientMedication->PatientMedicationID) }}">
        @csrf
        @method('PUT')
        @include('patient_medications.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
