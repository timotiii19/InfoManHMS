@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lab Procedures</h2>
    <a href="{{ route('lab_procedures.create') }}" class="btn btn-primary mb-3">Create Lab Procedure</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Test Date</th>
                <th>Result</th>
                <th>Date Released</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labProcedures as $labProcedure)
            <tr>
                <td>{{ $labProcedure->patient->FullName }}</td>
                <td>{{ $labProcedure->doctor->FullName }}</td>
                <td>{{ $labProcedure->TestDate }}</td>
                <td>{{ $labProcedure->Result }}</td>
                <td>{{ $labProcedure->DateReleased }}</td>
                <td>
                    <a href="{{ route('lab_procedures.edit', $labProcedure->LabProcedureID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lab_procedures.destroy', $labProcedure->LabProcedureID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this lab procedure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
