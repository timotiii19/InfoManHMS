@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Hospital Management System</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">

    
        <!-- Appointment -->
        <div class="col">
            <a href="{{ route('appointments.index') }}" class="btn btn-outline-primary w-100">Appointments</a>
        </div>

        <!-- Patients -->
        <div class="col">
            <a href="{{ route('patients.index') }}" class="btn btn-outline-primary w-100">Patients</a>
        </div>

        <!-- Doctors -->
        <div class="col">
            <a href="{{ route('doctors.index') }}" class="btn btn-outline-primary w-100">Doctors</a>
        </div>

        <!-- Nurses -->
        <div class="col">
            <a href="{{ route('nurses.index') }}" class="btn btn-outline-primary w-100">Nurses</a>
        </div>

        <!-- Departments -->
        <div class="col">
            <a href="{{ route('departments.index') }}" class="btn btn-outline-primary w-100">Departments</a>
        </div>

        <!-- Locations -->
        <div class="col">
            <a href="{{ route('locations.index') }}" class="btn btn-outline-primary w-100">Locations</a>
        </div>

        <!-- Inpatients -->
        <div class="col">
            <a href="{{ route('inpatients.index') }}" class="btn btn-outline-primary w-100">Inpatients</a>
        </div>

        <!-- Outpatients -->
        <div class="col">
            <a href="{{ route('outpatients.index') }}" class="btn btn-outline-primary w-100">Outpatients</a>
        </div>

        <!-- Lab Procedures -->
        <div class="col">
            <a href="{{ route('labprocedures.index') }}" class="btn btn-outline-primary w-100">Lab Procedures</a>
        </div>

        <!-- Emergencies -->
        <div class="col">
            <a href="{{ route('emergencies.index') }}" class="btn btn-outline-primary w-100">Emergencies</a>
        </div>

        <!-- Pharmacy -->
        <div class="col">
            <a href="{{ route('pharmacy.index') }}" class="btn btn-outline-primary w-100">Pharmacy</a>
        </div>

        <!-- Patient Medications -->
        <div class="col">
            <a href="{{ route('patient_medications.index') }}" class="btn btn-outline-primary w-100">Patient Medications</a>
        </div>

        <!-- Billing -->
        <div class="col">
            <a href="{{ route('billing.index') }}" class="btn btn-outline-primary w-100">Billing</a>
        </div>

        <!-- Pharmacists -->
        <div class="col">
            <a href="{{ route('pharmacists.index') }}" class="btn btn-outline-primary w-100">Pharmacists</a>
        </div>

        <!-- Cashiers -->
        <div class="col">
            <a href="{{ route('cashiers.index') }}" class="btn btn-outline-primary w-100">Cashiers</a>
        </div>

        <!-- Visitors -->
        <div class="col">
            <a href="{{ route('visitors.index') }}" class="btn btn-outline-primary w-100">Visitors</a>
        </div>
    </div>
</div>
@endsection
