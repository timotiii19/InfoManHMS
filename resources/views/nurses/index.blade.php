@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>All Nurses</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('nurses.create') }}" class="btn btn-primary mb-3">Add New Nurse</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Availability</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nurses as $nurse)
            <tr>
                <td>{{ $nurse->name }}</td>
                <td>{{ $nurse->email }}</td>
                <td>{{ $nurse->department->DepartmentName ?? 'N/A' }}</td>
                <td>{{ $nurse->availability }}</td>
                <td>{{ $nurse->contactNumber }}</td>
                <td>
                    <a href="{{ route('nurses.edit', $nurse->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
