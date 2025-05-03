@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pharmacy Inventory</h2>
    <a href="{{ route('pharmacy.create') }}" class="btn btn-primary mb-3">Add Medicine</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Manufacturer</th><th>Expiration</th><th>Qty</th><th>Price</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacy as $medicine)
            <tr>
                <td>{{ $medicine->MedicineName }}</td>
                <td>{{ $medicine->Manufacturer }}</td>
                <td>{{ $medicine->ExpirationDate }}</td>
                <td>{{ $medicine->Quantity }}</td>
                <td>${{ number_format($medicine->Price, 2) }}</td>
                <td>
                    <a href="{{ route('pharmacy.edit', $medicine) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pharmacy.destroy', $medicine) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this medicine?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
