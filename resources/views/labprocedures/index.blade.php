@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lab Procedures</h2>
    <a href="{{ route('labprocedures.create') }}" class="btn btn-primary mb-3">Add Lab Procedure</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th><th>Procedure Type</th><th>Date</th><th>Results</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labprocedures as $procedure)
            <tr>
                <td>{{ $procedure->patient->FirstName }} {{ $procedure->patient->LastName }}</td>
                <td>{{ $procedure->ProcedureType }}</td>
                <td>{{ $procedure->ProcedureDate }}</td>
                <td>{{ $procedure->Results }}</td>
                <td>
                    <a href="{{ route('labprocedures.edit', $procedure) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('labprocedures.destroy', $procedure) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this procedure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
