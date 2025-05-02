@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Lab Procedure</h2>
    <form method="POST" action="{{ route('lab-procedures.store') }}">
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
        <input type="datetime-local" name="test_date" class="form-control mb-2" required>
        <textarea name="result" class="form-control mb-2" placeholder="Test Result" required></textarea>
        <input type="date" name="date_released" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Submit Lab</button>
    </form>
</div>
@endsection
