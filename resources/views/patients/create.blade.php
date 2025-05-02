@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Patient</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select name="sex" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
        </div>

        <div class="mb-3">
            <label for="patient_type" class="form-label">Patient Type</label>
            <select name="patient_type" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="Inpatient" {{ old('patient_type') == 'Inpatient' ? 'selected' : '' }}>Inpatient</option>
                <option value="Outpatient" {{ old('patient_type') == 'Outpatient' ? 'selected' : '' }}>Outpatient</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Patient</button>
    </form>
</div>
@endsection
