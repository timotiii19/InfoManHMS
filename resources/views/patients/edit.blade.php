@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Patient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('patients.update', $patient->PatientID) }}">
        @csrf @method('PUT')
        <input type="text" name="Name" value="{{ $patient->Name }}" class="form-control mb-2" required>
        <input type="date" name="DateOfBirth" value="{{ $patient->DateOfBirth }}" class="form-control mb-2" required>
        <select name="Sex" class="form-control mb-2" required>
            <option value="Male" {{ $patient->Sex == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $patient->Sex == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        <input type="text" name="Address" value="{{ $patient->Address }}" class="form-control mb-2" required>
        <input type="text" name="ContactNumber" value="{{ $patient->ContactNumber }}" class="form-control mb-2" required>
        <select name="PatientType" class="form-control mb-2" required>
            <option value="Inpatient" {{ $patient->PatientType == 'Inpatient' ? 'selected' : '' }}>Inpatient</option>
            <option value="Outpatient" {{ $patient->PatientType == 'Outpatient' ? 'selected' : '' }}>Outpatient</option>
        </select>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
