@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Departments</h2>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Description</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->DepartmentName }}</td>
                <td>{{ $department->Description }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this department?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
