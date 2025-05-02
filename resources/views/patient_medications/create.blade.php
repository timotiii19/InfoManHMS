@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Medication</h2>
    <form method="POST" action="{{ route('patient-medications.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <select name="medicine_id" class="form-control mb-2" required>
            @foreach($medicines as $med)
                <option value="{{ $med->id }}">{{ $med->description }}</option>
            @endforeach
        </select>
        <select name="doctor_id" class="form-control mb-2" required>
            @foreach($doctors as $doc)
                <option value="{{ $doc->id }}">{{ $doc->doctor_name }}</option>
            @endforeach
        </select>
        <input type="text" name="dosage" placeholder="Dosage" class="form-control mb-2" required>
        <input type="text" name="frequency" placeholder="Frequency" class="form-control mb-2" required>
        <input type="date" name="start_date" class="form-control mb-2" required>
        <input type="date" name="end_date" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Assign Medication</button>
    </form>
</div>
@endsection
