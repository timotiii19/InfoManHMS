@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Inpatient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('inpatients.update', $inpatient->InpatientID) }}">
        @csrf @method('PUT')

        <select name="PatientID" class="form-control mb-2" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->PatientID }}" {{ $inpatient->PatientID == $patient->PatientID ? 'selected' : '' }}>{{ $patient->Name }}</option>
            @endforeach
        </select>

        <select name="DoctorID" class="form-control mb-2" required>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->DoctorID }}" {{ $inpatient->DoctorID == $doctor->DoctorID ? 'selected' : '' }}>{{ $doctor->DoctorName }}</option>
            @endforeach
        </select>

        <select name="DepartmentID" class="form-control mb-2" required>
            @foreach($departments as $dept)
                <option value="{{ $dept->DepartmentID }}" {{ $inpatient->DepartmentID == $dept->DepartmentID ? 'selected' : '' }}>{{ $dept->DepartmentName }}</option>
            @endforeach
        </select>

        <select name="LocationID" class="form-control mb-2" required>
            @foreach($locations as $loc)
                <option value="{{ $loc->LocationID }}" {{ $inpatient->LocationID == $loc->LocationID ? 'selected' : '' }}>
                    Room {{ $loc->RoomNumber }} - {{ $loc->RoomType }}
                </option>
            @endforeach
        </select>

        <input type="text" name="Availability" value="{{ $inpatient->Availability }}" class="form-control mb-2" required>

        <textarea name="MedicalRecord" class="form-control mb-2" rows="4">{{ $inpatient->MedicalRecord }}</textarea>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
