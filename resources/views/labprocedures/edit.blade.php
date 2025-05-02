@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Lab Procedure</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('labprocedures.update', $labprocedure->LabProcedureID) }}">
        @csrf @method('PUT')

        <select name="PatientID" class="form-control mb-2" required>
            @foreach($patients as $p)
                <option value="{{ $p->PatientID }}" {{ $labprocedure->PatientID == $p->PatientID ? 'selected' : '' }}>{{ $p->Name }}</option>
            @endforeach
        </select>

        <select name="DoctorID" class="form-control mb-2" required>
            @foreach($doctors as $d)
                <option value="{{ $d->DoctorID }}" {{ $labprocedure->DoctorID == $d->DoctorID ? 'selected' : '' }}>{{ $d->DoctorName }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="TestDate" value="{{ \Carbon\Carbon::parse($labprocedure->TestDate)->format('Y-m-d\TH:i') }}" class="form-control mb-2" required>
        <textarea name="Result" class="form-control mb-2" rows="3">{{ $labprocedure->Result }}</textarea>
        <input type="date" name="DateReleased" value="{{ $labprocedure->DateReleased }}" class="form-control mb-2" required>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
