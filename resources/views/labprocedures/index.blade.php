@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Lab Procedures</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('labprocedures.create') }}" class="btn btn-primary mb-3">Add Lab Test</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @foreach($labprocedures as $lp)
            <tr>
                <td>{{ $lp->patient->Name ?? 'N/A' }}</td>
                <td>{{ $lp->doctor->DoctorName ?? 'N/A' }}</td>
                <td>{{ $lp->TestDate }}</td>
                <td>{{ $lp->Result }}</td>
                <td>{{ $lp->DateReleased }}</td>
                <td>
                    <a href="{{ route('labprocedures.edit', $lp->LabProcedureID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('labprocedures.destroy', $lp->LabProcedureID) }}" method="POST" style="display:inline;">
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
