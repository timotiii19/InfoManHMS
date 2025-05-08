@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nurses</h2>
    <a href="{{ route('nurses.create') }}" class="btn btn-primary mb-3">Create Nurse</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Availability</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nurses as $nurse)
            <tr>
                <td>{{ $nurse->Name }}</td>
                <td>{{ $nurse->department->DepartmentName }}</td>
                <td>{{ $nurse->Email }}</td>
                <td>{{ $nurse->Availability }}</td>
                <td>{{ $nurse->ContactNumber }}</td>
                <td>
                    <a href="{{ route('nurses.edit', $nurse->NurseID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('nurses.destroy', $nurse->NurseID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this nurse?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
