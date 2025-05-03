@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nurses</h2>
    <a href="{{ route('nurses.create') }}" class="btn btn-primary mb-3">Add Nurse</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Gender</th><th>DOB</th><th>Phone</th><th>Email</th><th>Department</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nurses as $nurse)
            <tr>
                <td>{{ $nurse->FirstName }} {{ $nurse->LastName }}</td>
                <td>{{ $nurse->Gender }}</td>
                <td>{{ $nurse->DateOfBirth }}</td>
                <td>{{ $nurse->Phone }}</td>
                <td>{{ $nurse->Email }}</td>
                <td>{{ $nurse->Department }}</td>
                <td>
                    <a href="{{ route('nurses.edit', $nurse) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('nurses.destroy', $nurse) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this nurse?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
