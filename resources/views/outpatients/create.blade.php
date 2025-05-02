@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Outpatient Visit</h2>
    <form method="POST" action="{{ route('outpatients.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <select name="doctor_id" class="form-control mb-2" required>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
            @endforeach
        </select>
        <select name="department_id" class="form-control mb-2" required>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
        <input type="datetime-local" name="visit_date" class="form-control mb-2" required>
        <textarea name="reason" class="form-control mb-2" placeholder="Visit Reason" required></textarea>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
