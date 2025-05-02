@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Outpatient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('outpatients.store') }}">
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

        <select name="DepartmentID" class="form-control mb-2" required>
            <option value="">Select Department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->DepartmentID }}">{{ $dept->DepartmentName }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="VisitDate" class="form-control mb-2" required>
        <textarea name="Reason" class="form-control mb-2" placeholder="Reason for Visit" rows="3" required></textarea>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
