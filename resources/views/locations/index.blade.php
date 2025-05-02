@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Locations</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Add New Location</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Type</th>
                <th>Capacity</th>
                <th>Availability</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Room Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->RoomType }}</td>
                <td>{{ $location->RoomCapacity }}</td>
                <td>{{ $location->Availability }}</td>
                <td>{{ $location->Building }}</td>
                <td>{{ $location->Floor }}</td>
                <td>{{ $location->RoomNumber }}</td>
                <td>
                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
