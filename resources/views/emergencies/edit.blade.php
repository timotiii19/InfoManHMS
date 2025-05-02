@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Emergency</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    

    <form action="{{ route('emergencies.update', $emergency->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach($patients as $p)
                    <option value="{{ $p->id }}" {{ $emergency->patient_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nurse (optional)</label>
            <select name="nurse_id" class="form-control">
                <option value="">Select Nurse</option>
                @foreach($nurses as $n)
                    <option value="{{ $n->id }}" {{ $emergency->nurse_id == $n->id ? 'selected' : '' }}>{{ $n->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $emergency->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Emergency Time</label>
            <input type="datetime-local" name="emergency_time" class="form-control" value="{{ \Carbon\Carbon::parse($emergency->emergency_time)->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Emergency</button>
    </form>
</div>
@endsection
