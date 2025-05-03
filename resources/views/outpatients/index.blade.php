@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Outpatients</h2>
    <a href="{{ route('outpatients.create') }}" class="btn btn-primary mb-3">Add Outpatient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th><th>Visit Date</th><th>Diagnosis</th><th>Treatment</th><th>Doctor</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outpatients as $out)
            <tr>
                <td>{{ $out->patient->FirstName }} {{ $out->patient->LastName }}</td>
                <td>{{ $out->VisitDate }}</td>
                <td>{{ $out->Diagnosis }}</td>
                <td>{{ $out->Treatment }}</td>
                <td>{{ $out->Doctor }}</td>
                <td>
                    <a href="{{ route('outpatients.edit', $out) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('outpatients.destroy', $out) }}" method="POST" class="d-inline">
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
