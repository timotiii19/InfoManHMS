@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Doctor</h3>
    @include('partials.back-to-dashboard')

    {{-- Ensure $departments is passed from the controller --}}
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Doctor Name</label>
            <input type="text" name="DoctorName" class="form-control" value="{{ old('DoctorName') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="Email" class="form-control" value="{{ old('Email') }}" required>
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select name="DepartmentID" class="form-select" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->DepartmentID }}" {{ old('DepartmentID') == $department->DepartmentID ? 'selected' : '' }}>
                        {{ $department->DepartmentName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="text" name="Availability" class="form-control" value="{{ old('Availability') }}">
        </div>

        <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact Number</label>
            <input type="text" name="ContactNumber" class="form-control" value="{{ old('ContactNumber') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
