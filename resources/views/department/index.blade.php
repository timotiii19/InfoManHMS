@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Departments</h3>
    @include('partials.back-to-dashboard')

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Room</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td>{{ $department->DepartmentID }}</td>
                <td>{{ $department->DepartmentName }}</td>
                <td>{{ $department->DepartmentRoom }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departments.destroy', $department->DepartmentID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this department?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
