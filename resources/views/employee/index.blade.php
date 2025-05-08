@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Employee List</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Type</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->Name }}</td>
                <td>{{ $employee->Email }}</td>
                <td>{{ $employee->ContactNumber }}</td>
                <td>{{ $employee->EmployeeType }}</td>
                <td>{{ optional($employee->department)->DepartmentName ?? '-' }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee->EmployeeID) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('employees.edit', $employee->EmployeeID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->EmployeeID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
