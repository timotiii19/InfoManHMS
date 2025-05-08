@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Patient</h2>
    <form method="POST" action="{{ route('patients.update', $patient->PatientID) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name', $patient->Name) }}" required>
        </div>
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" value="{{ old('DateOfBirth', $patient->DateOfBirth) }}" required>
        </div>
        <div class="mb-3">
            <label for="Sex" class="form-label">Sex</label>
            <select class="form-control" id="Sex" name="Sex" required>
                <option value="Male" @if($patient->Sex == 'Male') selected @endif>Male</option>
                <option value="Female" @if($patient->Sex == 'Female') selected @endif>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" value="{{ old('Address', $patient->Address) }}" required>
        </div>
        <div class="mb-3">
            <label for="ContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" value="{{ old('ContactNumber', $patient->ContactNumber) }}" required>
        </div>
        <div class="mb-3">
            <label for="PatientType" class="form-label">Patient Type</label>
            <select class="form-control" id="PatientType" name="PatientType" required>
                <option value="Outpatient" @if($patient->PatientType == 'Outpatient') selected @endif>Outpatient</option>
                <option value="Inpatient" @if($patient->PatientType == 'Inpatient') selected @endif>Inpatient</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
