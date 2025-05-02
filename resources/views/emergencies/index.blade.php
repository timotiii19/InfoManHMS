@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Emergency Records</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('emergencies.create') }}" class="btn btn-primary mb-3">Add Emergency</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Nurse</th>
                <th>Description</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emergencies as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->patient->name ?? 'N/A' }}</td>
                <td>{{ $e->nurse->name ?? 'N/A' }}</td>
                <td>{{ $e->description }}</td>
                <td>{{ $e->emergency_time }}</td>
                <td>
                    <a href="{{ route('emergencies.edit', $e->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('emergencies.destroy', $e->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this emergency?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
