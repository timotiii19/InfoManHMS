@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Doctors</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Add Doctor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Availability</th>
                <th>Contact</th>
                <th>Type</th>
                <th>Room Type</th>
                <th>Department</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($doctors as $doc)
            <tr>
                <td>{{ $doc->DoctorName }}</td>
                <td>{{ $doc->Email }}</td>
                <td>{{ $doc->Availability }}</td>
                <td>{{ $doc->ContactNumber }}</td>
                <td>{{ $doc->DoctorType }}</td>
                <td>{{ $doc->RoomType }}</td>
                <td>{{ $doc->department->DepartmentName ?? 'N/A' }}</td>
                <td>{{ $doc->location->Building ?? 'N/A' }} - Room {{ $doc->location->RoomNumber ?? '' }}</td>
                <td>
                    <a href="{{ route('doctors.edit', $doc->DoctorID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('doctors.destroy', $doc->DoctorID) }}" method="POST" style="display:inline;">
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
