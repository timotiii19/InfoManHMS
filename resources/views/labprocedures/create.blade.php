@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Lab Procedure</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('labprocedures.store') }}">
        @csrf

        <select name="PatientID" class="form-control mb-2" required>
            <option value="">Select Patient</option>
            @foreach($patients as $p)
                <option value="{{ $p->PatientID }}">{{ $p->Name }}</option>
            @endforeach
        </select>

        <select name="DoctorID" class="form-control mb-2" required>
            <option value="">Select Doctor</option>
            @foreach($doctors as $d)
                <option value="{{ $d->DoctorID }}">{{ $d->DoctorName }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="TestDate" class="form-control mb-2" required>
        <textarea name="Result" class="form-control mb-2" placeholder="Result" rows="3" required></textarea>
        <input type="date" name="DateReleased" class="form-control mb-2" required>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
