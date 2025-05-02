@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Doctor List</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Add Doctor</a>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->DoctorName }}</td>
                <td>{{ $doctor->Email }}</td>
                <td>{{ $doctor->DoctorType }}</td>
                <td>{{ $doctor->Availability }}</td>
                <td>{{ $doctor->ContactNumber }}</td>
                <td>
                    <a href="{{ route('doctors.edit', $doctor->DoctorID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('doctors.destroy', $doctor->DoctorID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this doctor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
