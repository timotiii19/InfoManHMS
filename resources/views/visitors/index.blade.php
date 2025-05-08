@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Visitors</h2>
    <a href="{{ route('visitors.create') }}" class="btn btn-primary mb-3">Add Visitor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Visitor Name</th>
                <th>Patient</th>
                <th>Visit Date & Time</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{ $visitor->VisitorName }}</td>
                <td>{{ $visitor->patient->Name }}</td>
                <td>{{ $visitor->VisitDateTime }}</td>
                <td>{{ $visitor->location->RoomNumber }} ({{ $visitor->location->Building }})</td>
                <td>
                    <a href="{{ route('visitors.edit', $visitor->VisitorID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('visitors.destroy', $visitor->VisitorID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
