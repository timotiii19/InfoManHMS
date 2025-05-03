@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Locations and Rooms</h2>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Add Room</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Location</th><th>Room</th><th>Type</th><th>Capacity</th><th>Description</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->LocationName }}</td>
                <td>{{ $location->RoomName }}</td>
                <td>{{ $location->RoomType }}</td>
                <td>{{ $location->Capacity }}</td>
                <td>{{ $location->Description }}</td>
                <td>
                    <a href="{{ route('locations.edit', $location) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('locations.destroy', $location) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this room?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
