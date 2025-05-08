@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($patient) ? 'Edit Patient' : 'Create New Patient' }}</h2>

    <form method="POST" action="{{ isset($patient) ? route('patients.update', $patient->PatientID) : route('patients.store') }}">
        @csrf
        @if(isset($patient))
            @method('PUT') <!-- Use PUT for update -->
        @endif

        <!-- Patient Name -->
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name', isset($patient) ? $patient->Name : '') }}" required>
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" value="{{ old('DateOfBirth', isset($patient) ? $patient->DateOfBirth : '') }}" required>
        </div>

        <!-- Sex -->
        <div class="mb-3">
            <label for="Sex" class="form-label">Sex</label>
            <select class="form-control" id="Sex" name="Sex" required>
                <option value="Male" {{ old('Sex', isset($patient) ? $patient->Sex : '') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('Sex', isset($patient) ? $patient->Sex : '') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" value="{{ old('Address', isset($patient) ? $patient->Address : '') }}" required>
        </div>

        <!-- Contact Number -->
        <div class="mb-3">
            <label for="ContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" value="{{ old('ContactNumber', isset($patient) ? $patient->ContactNumber : '') }}" required>
        </div>

        <!-- Patient Type -->
        <div class="mb-3">
            <label for="PatientType" class="form-label">Patient Type</label>
            <select class="form-control" id="PatientType" name="PatientType" required>
                <option value="Outpatient" {{ old('PatientType', isset($patient) ? $patient->PatientType : '') == 'Outpatient' ? 'selected' : '' }}>Outpatient</option>
                <option value="Inpatient" {{ old('PatientType', isset($patient) ? $patient->PatientType : '') == 'Inpatient' ? 'selected' : '' }}>Inpatient</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($patient) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
