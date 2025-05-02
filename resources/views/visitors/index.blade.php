@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Visitor Log</h2>
    <a href="{{ route('visitors.create') }}" class="btn btn-primary mb-3">Add Visitor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Relation</th>
                <th>Patient</th>
                <th>Visit Time</th>
                <th>Purpose</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{ $visitor->visitor_name }}</td>
                <td>{{ $visitor->relation_to_patient }}</td>
                <td>{{ $visitor->patient->name }}</td>
                <td>{{ $visitor->visit_time }}</td>
                <td>{{ $visitor->purpose }}</td>
                <td>
                    <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this visitor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
