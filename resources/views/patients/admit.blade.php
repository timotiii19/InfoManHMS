@extends('layouts.app')

@section('title', 'Admit New Patient')

@section('content')
    <h2 class="text-center mb-4">Admit New Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
            <label for="FullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="FullName" name="FullName" required>
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
        </div>

        <!-- Sex -->
        <div class="mb-3">
            <label for="Sex" class="form-label">Sex</label>
            <select class="form-select" id="Sex" name="Sex" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
        </div>

        <!-- Contact Number -->
        <div class="mb-3">
            <label for="ContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" required>
        </div>

        <!-- Patient Type -->
        <div class="mb-3">
            <label for="PatientType" class="form-label">Patient Type</label>
            <select class="form-select" id="PatientType" name="PatientType" required>
                <option value="Inpatient">Inpatient</option>
                <option value="Outpatient">Outpatient</option>
            </select>
        </div>

        <!-- Location for Inpatient -->
        <div class="mb-3" id="locationContainer" style="display:none;">
            <label for="LocationID" class="form-label">Location</label>
            <select class="form-select" id="LocationID" name="LocationID">
                @foreach($locations as $location)
                    <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Admit Patient</button>
    </form>

    <script>
        document.getElementById('PatientType').addEventListener('change', function() {
            const patientType = this.value;
            const locationContainer = document.getElementById('locationContainer');

            if (patientType === 'Inpatient') {
                locationContainer.style.display = 'block';
            } else {
                locationContainer.style.display = 'none';
            }
        });
    </script>
@endsection
