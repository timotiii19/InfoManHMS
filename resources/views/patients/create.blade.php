@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Patient</h2>
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
        </div>
        <div class="mb-3">
            <label for="Sex" class="form-label">Sex</label>
            <select class="form-control" id="Sex" name="Sex" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
        </div>
        <div class="mb-3">
            <label for="ContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" required>
        </div>
        <div class="mb-3">
            <label for="PatientType" class="form-label">Patient Type</label>
            <select class="form-control" id="PatientType" name="PatientType" required>
                <option value="Outpatient">Outpatient</option>
                <option value="Inpatient">Inpatient</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
