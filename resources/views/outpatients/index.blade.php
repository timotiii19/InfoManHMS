@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Outpatients</h2>
    <a href="{{ route('outpatients.create') }}" class="btn btn-primary mb-3">Create Outpatient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Visit Date</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outpatients as $outpatient)
            <tr>
                <td>{{ $outpatient->patient->FullName }}</td>
                <td>{{ $outpatient->doctor->FullName }}</td>
                <td>{{ $outpatient->department->DepartmentName }}</td>
                <td>{{ $outpatient->VisitDate }}</td>
                <td>{{ $outpatient->Reason }}</td>
                <td>
                    <a href="{{ route('outpatients.edit', $outpatient->OutpatientID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('outpatients.destroy', $outpatient->OutpatientID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this outpatient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
