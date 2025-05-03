@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pharmacists</h2>
    <a href="{{ route('pharmacists.create') }}" class="btn btn-primary mb-3">Add Pharmacist</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacists as $pharmacist)
            <tr>
                <td>{{ $pharmacist->FirstName }}</td>
                <td>{{ $pharmacist->LastName }}</td>
                <td>{{ $pharmacist->Email }}</td>
                <td>{{ $pharmacist->PhoneNumber }}</td>
                <td>
                    <a href="{{ route('pharmacists.edit', $pharmacist) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pharmacists.destroy', $pharmacist) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this pharmacist?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
