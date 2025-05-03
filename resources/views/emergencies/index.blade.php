@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Emergency Records</h2>
    <a href="{{ route('emergencies.create') }}" class="btn btn-primary mb-3">Add Emergency</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th><th>Condition</th><th>Arrival</th><th>Actions Taken</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emergencies as $emergency)
            <tr>
                <td>{{ $emergency->patient->FirstName }} {{ $emergency->patient->LastName }}</td>
                <td>{{ $emergency->Condition }}</td>
                <td>{{ $emergency->ArrivalTime }}</td>
                <td>{{ $emergency->ActionsTaken }}</td>
                <td>
                    <a href="{{ route('emergencies.edit', $emergency) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('emergencies.destroy', $emergency) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this emergency?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
