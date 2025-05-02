@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Inpatient Record</h2>
    <form method="POST" action="{{ route('inpatients.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            <option value="">Select Patient</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <select name="doctor_id" class="form-control mb-2" required>
            <option value="">Select Doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
            @endforeach
        </select>
        <select name="department_id" class="form-control mb-2" required>
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
        <select name="location_id" class="form-control mb-2" required>
            <option value="">Select Room</option>
            @foreach($locations as $loc)
                <option value="{{ $loc->id }}">Room {{ $loc->room_number }}</option>
            @endforeach
        </select>
        <input type="text" name="availability" placeholder="Availability" class="form-control mb-2" required>
        <textarea name="medical_record" class="form-control mb-2" placeholder="Medical Record" required></textarea>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
