@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Inpatient List</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('inpatients.create') }}" class="btn btn-primary mb-3">Admit Inpatient</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inpatients as $inpatient)
            <tr>
                <td>{{ $inpatient->patient->Name ?? 'N/A' }}</td>
                <td>{{ $inpatient->doctor->DoctorName ?? 'N/A' }}</td>
                <td>{{ $inpatient->department->DepartmentName ?? 'N/A' }}</td>
                <td>{{ $inpatient->location->RoomNumber ?? 'N/A' }}</td>
                <td>{{ $inpatient->Availability }}</td>
                <td>
                    <a href="{{ route('inpatients.edit', $inpatient->InpatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('inpatients.destroy', $inpatient->InpatientID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
