@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pharmacists</h2>
    <a href="{{ route('pharmacists.create') }}" class="btn btn-primary mb-3">Create Pharmacist</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacists as $pharmacist)
            <tr>
                <td>{{ $pharmacist->Name }}</td>
                <td>{{ $pharmacist->ContactNumber }}</td>
                <td>
                    <a href="{{ route('pharmacists.edit', $pharmacist->PharmacistID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pharmacists.destroy', $pharmacist->PharmacistID) }}" method="POST" style="display:inline;">
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
