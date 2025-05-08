@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Appointment</h2>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label>Patient</label>
            <select name="PatientID" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->PatientID }}">{{ $patient->FirstName }} {{ $patient->LastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Doctor</label>
            <select name="DoctorID" class="form-control" required>
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->DoctorID }}">{{ $doctor->FirstName }} {{ $doctor->LastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <select name="DepartmentID" class="form-control" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Visit Date</label>
            <input type="datetime-local" name="VisitDate" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Reason</label>
            <textarea name="Reason" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Appointment</button>
    </form>
</div>
@endsection
