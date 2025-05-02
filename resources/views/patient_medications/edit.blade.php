@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Medication for {{ $medication->patient->name }}</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('patient_medications.form', [
        'route'      => route('patient_medications.update', $medication->PatientMedicationID),
        'method'     => 'PUT',
        'medication'=> $medication,
        'patients'  => $patients,
        'medicines' => $medicines,
        'doctors'   => $doctors,
    ])
</div>
@endsection
