@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inpatients</h2>
    <a href="{{ route('inpatients.create') }}" class="btn btn-primary mb-3">Add Inpatient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th><th>Admission Date</th><th>Discharge Date</th><th>Diagnosis</th><th>Treatment</th><th>Doctor</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inpatients as $in)
            <tr>
                <td>{{ $in->patient->FirstName }} {{ $in->patient->LastName }}</td>
                <td>{{ $in->AdmissionDate }}</td>
                <td>{{ $in->DischargeDate ?? 'N/A' }}</td>
                <td>{{ $in->Diagnosis }}</td>
                <td>{{ $in->Treatment }}</td>
                <td>{{ $in->Doctor }}</td>
                <td>
                    <a href="{{ route('inpatients.edit', $in) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inpatients.destroy', $in) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
