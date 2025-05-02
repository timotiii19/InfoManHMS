@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Outpatient</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('outpatients.update', $outpatient->OutpatientID) }}">
        @csrf @method('PUT')

        <select name="PatientID" class="form-control mb-2" required>
            @foreach($patients as $p)
                <option value="{{ $p->PatientID }}" {{ $outpatient->PatientID == $p->PatientID ? 'selected' : '' }}>{{ $p->Name }}</option>
            @endforeach
        </select>

        <select name="DoctorID" class="form-control mb-2" required>
            @foreach($doctors as $d)
                <option value="{{ $d->DoctorID }}" {{ $outpatient->DoctorID == $d->DoctorID ? 'selected' : '' }}>{{ $d->DoctorName }}</option>
            @endforeach
        </select>

        <select name="DepartmentID" class="form-control mb-2" required>
            @foreach($departments as $dept)
                <option value="{{ $dept->DepartmentID }}" {{ $outpatient->DepartmentID == $dept->DepartmentID ? 'selected' : '' }}>{{ $dept->DepartmentName }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="VisitDate" value="{{ \Carbon\Carbon::parse($outpatient->VisitDate)->format('Y-m-d\TH:i') }}" class="form-control mb-2" required>
        <textarea name="Reason" class="form-control mb-2" rows="3">{{ $outpatient->Reason }}</textarea>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
