@extends('layouts.app')

@section('title', 'Admit Inpatient')

@section('content')
    <h2 class="mb-4">Admit Inpatient</h2>

    <form action="{{ route('inpatients.store') }}" method="POST">
        @csrf

        <!-- Patient -->
        <div class="mb-3">
            <label for="patientName" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="patientName" name="patientName" value="{{ $patient->FullName }}" readonly>
            <input type="hidden" name="PatientID" value="{{ $patient->PatientID }}">
        </div>

        <!-- Doctor -->
        <div class="mb-3">
            <label for="DoctorID" class="form-label">Doctor</label>
            <select class="form-select" id="DoctorID" name="DoctorID">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->DoctorID }}">{{ $doctor->Name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Department -->
        <div class="mb-3">
            <label for="DepartmentID" class="form-label">Department</label>
            <select class="form-select" id="DepartmentID" name="DepartmentID">
                @foreach($departments as $department)
                    <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                @endforeach
            </select>
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="LocationID" class="form-label">Location</label>
            <select class="form-select" id="LocationID" name="LocationID">
                @foreach($locations as $location)
                    <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
                @endforeach
            </select>
        </div>

        <!-- Availability -->
        <div class="mb-3">
            <label for="Availability" class="form-label">Availability</label>
            <input type="text" class="form-control" id="Availability" name="Availability" readonly value="Occupied">
        </div>

        <!-- Medical Record -->
        <div class="mb-3">
            <label for="MedicalRecord" class="form-label">Medical Record</label>
            <textarea class="form-control" id="MedicalRecord" name="MedicalRecord"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Admit Inpatient</button>
    </form>
@endsection
