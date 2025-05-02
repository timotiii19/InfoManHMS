@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Outpatient Records</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('outpatients.create') }}" class="btn btn-primary mb-3">Add Outpatient</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @foreach($outpatients as $op)
            <tr>
                <td>{{ $op->patient->Name ?? 'N/A' }}</td>
                <td>{{ $op->doctor->DoctorName ?? 'N/A' }}</td>
                <td>{{ $op->department->DepartmentName ?? 'N/A' }}</td>
                <td>{{ $op->VisitDate }}</td>
                <td>{{ $op->Reason }}</td>
                <td>
                    <a href="{{ route('outpatients.edit', $op->OutpatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('outpatients.destroy', $op->OutpatientID) }}" method="POST" style="display:inline;">
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
