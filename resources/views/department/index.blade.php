@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Departments</h2>
    <a href="{{ route('department.create') }}" class="btn btn-primary mb-3">Add Department</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Room</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->DepartmentName }}</td>
                <td>{{ $department->DepartmentRoom }}</td>
                <td>
                    <a href="{{ route('department.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('department.destroy', $department->DepartmentID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
