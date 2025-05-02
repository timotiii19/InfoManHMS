@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Emergency</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    <form action="{{ route('emergencies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Patient</label>
            <select name="patient_id" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach($patients as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nurse (optional)</label>
            <select name="nurse_id" class="form-control">
                <option value="">Select Nurse</option>
                @foreach($nurses as $n)
                    <option value="{{ $n->id }}">{{ $n->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Emergency Time</label>
            <input type="datetime-local" name="emergency_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Emergency</button>
    </form>
</div>
@endsection
