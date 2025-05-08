@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Emergencies</h2>
    <a href="{{ route('emergencies.create') }}" class="btn btn-primary mb-3">Create Emergency</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Nurse</th>
                <th>Date & Time</th>
                <th>Emergency Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emergencies as $emergency)
            <tr>
                <td>{{ $emergency->patient->FullName }}</td>
                <td>{{ $emergency->doctor->FullName }}</td>
                <td>{{ $emergency->nurse->FullName }}</td>
                <td>{{ $emergency->DateTime }}</td>
                <td>{{ $emergency->EmergencyType }}</td>
                <td>
                    <a href="{{ route('emergencies.edit', $emergency->EmergencyID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('emergencies.destroy', $emergency->EmergencyID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this emergency?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
