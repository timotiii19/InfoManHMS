@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pharmacy Inventory</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <a href="{{ route('pharmacy.create') }}" class="btn btn-primary mb-3">Add Medicine</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Manufacturer</th>
                <th>Batch No</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Expiry</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicines as $med)
            <tr>
                <td>{{ $med->medicine_name }}</td>
                <td>{{ $med->manufacturer }}</td>
                <td>{{ $med->batch_no }}</td>
                <td>{{ $med->quantity }}</td>
                <td>{{ $med->unit }}</td>
                <td>{{ $med->expiry_date }}</td>
                <td>${{ $med->price }}</td>
                <td>
                    <a href="{{ route('pharmacy.edit', $med->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pharmacy.destroy', $med->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this medicine?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
