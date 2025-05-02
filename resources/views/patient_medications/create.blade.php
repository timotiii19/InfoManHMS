@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add Patient Medication</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('patient_medications.form', [
        'route'     => route('patient_medications.store'),
        'method'    => 'POST',
        'medication'=> null,
        'patients'  => $patients,
        'medicines' => $medicines,
        'doctors'   => $doctors,
    ])
</div>
@endsection
