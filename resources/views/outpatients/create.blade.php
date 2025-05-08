@extends('layouts.app')

@section('title', 'Create Outpatient')

@section('content')
    <h2 class="mb-4">Create Outpatient</h2>

    <form action="{{ route('outpatients.store') }}" method="POST">
    @csrf
    <input type="hidden" name="PatientID" value="{{ $patient->PatientID }}">
    


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

        <!-- Visit Date -->
        <div class="mb-3">
            <label for="VisitDate" class="form-label">Visit Date</label>
            <input type="date" class="form-control" id="VisitDate" name="VisitDate">
        </div>

        <!-- Reason -->
        <div class="mb-3">
            <label for="Reason" class="form-label">Reason</label>
            <textarea class="form-control" id="Reason" name="Reason"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
