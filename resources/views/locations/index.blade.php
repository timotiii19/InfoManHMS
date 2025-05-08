@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Locations</h2>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Create Location</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room Type</th>
                <th>Room Capacity</th>
                <th>Availability</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Room Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->RoomType }}</td>
                <td>{{ $location->RoomCapacity }}</td>
                <td>{{ $location->Availability }}</td>
                <td>{{ $location->Building }}</td>
                <td>{{ $location->Floor }}</td>
                <td>{{ $location->RoomNumber }}</td>
                <td>
                    <a href="{{ route('locations.edit', $location->LocationID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('locations.destroy', $location->LocationID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this location?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
