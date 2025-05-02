@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Patient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf
        <input type="text" name="Name" placeholder="Name" class="form-control mb-2" required>
        <input type="date" name="DateOfBirth" class="form-control mb-2" required>
        <select name="Sex" class="form-control mb-2" required>
            <option value="">Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="text" name="Address" placeholder="Address" class="form-control mb-2" required>
        <input type="text" name="ContactNumber" placeholder="Contact Number" class="form-control mb-2" required>
        <select name="PatientType" class="form-control mb-2" required>
            <option value="">Select Type</option>
            <option value="Inpatient">Inpatient</option>
            <option value="Outpatient">Outpatient</option>
        </select>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
