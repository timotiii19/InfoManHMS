@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Pharmacists</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('pharmacists.create') }}" class="btn btn-primary mb-3">Add Pharmacist</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                <td>{{ $pharmacist->name }}</td>
                <td>{{ $pharmacist->contact_number }}</td>
                <td>
                    <a href="{{ route('pharmacists.edit', $pharmacist->PharmacistID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pharmacists.destroy', $pharmacist->PharmacistID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this pharmacist?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
