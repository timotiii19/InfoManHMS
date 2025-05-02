@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Admit Inpatient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('inpatients.store') }}">
        @csrf

        <select name="PatientID" class="form-control mb-2" required>
            <option value="">Select Patient</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->PatientID }}">{{ $patient->Name }}</option>
            @endforeach
        </select>

        <select name="DoctorID" class="form-control mb-2" required>
            <option value="">Select Doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->DoctorID }}">{{ $doctor->DoctorName }}</option>
            @endforeach
        </select>

        <select name="DepartmentID" class="form-control mb-2" required>
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->DepartmentID }}">{{ $dept->DepartmentName }}</option>
            @endforeach
        </select>

        <select name="LocationID" class="form-control mb-2" required>
            <option value="">Select Location</option>
            @foreach($locations as $loc)
                <option value="{{ $loc->LocationID }}">Room {{ $loc->RoomNumber }} - {{ $loc->RoomType }}</option>
            @endforeach
        </select>

        <input type="text" name="Availability" class="form-control mb-2" placeholder="Availability (e.g. Occupied)" required>

        <textarea name="MedicalRecord" class="form-control mb-2" placeholder="Medical Record" rows="4"></textarea>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
