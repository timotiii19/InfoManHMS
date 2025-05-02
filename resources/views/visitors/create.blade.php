@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Log Visitor</h2>
    <form method="POST" action="{{ route('visitors.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <input type="text" name="visitor_name" placeholder="Visitor Name" class="form-control mb-2" required>
        <input type="text" name="relationship" placeholder="Relationship" class="form-control mb-2" required>
        <input type="datetime-local" name="visit_date_time" class="form-control mb-2" required>
        <select name="location_id" class="form-control mb-2" required>
            @foreach($locations as $loc)
                <option value="{{ $loc->id }}">Room {{ $loc->room_number }} - {{ $loc->building }}</option>
            @endforeach
        </select>
        <input type="text" name="contact_number" placeholder="Contact Number" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Log Visit</button>
    </form>
</div>
@endsection
