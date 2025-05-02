@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Emergency Case</h2>
    <form method="POST" action="{{ route('emergencies.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            <option value="">Select Patient</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <select name="nurse_id" class="form-control mb-2" required>
            <option value="">Select Nurse</option>
            @foreach($nurses as $nurse)
                <option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
            @endforeach
        </select>
        <select name="doctor_id" class="form-control mb-2" required>
            <option value="">Select Doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
            @endforeach
        </select>
        <input type="datetime-local" name="date_time" class="form-control mb-2" required>
        <input type="text" name="emergency_type" placeholder="Emergency Type" class="form-control mb-2" required>
        <button type="submit" class="btn btn-danger">Record Emergency</button>
    </form>
</div>
@endsection
