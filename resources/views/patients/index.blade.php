@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Patient List</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add Patient</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Patient Type</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->Name }}</td>
                <td>{{ $patient->PatientType }}</td>
                <td>{{ $patient->ContactNumber }}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->PatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->PatientID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
