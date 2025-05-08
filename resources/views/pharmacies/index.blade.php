@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Medicines</h2>
    <a href="{{ route('pharmacies.create') }}" class="btn btn-primary mb-3">Create Medicine</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Pharmacist</th>
                <th>Stock Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacies as $pharmacy)
            <tr>
                <td>{{ $pharmacy->Description }}</td>
                <td>{{ $pharmacy->pharmacist->Name }}</td>
                <td>{{ $pharmacy->StockQuantity }}</td>
                <td>{{ $pharmacy->Price }}</td>
                <td>
                    <a href="{{ route('pharmacies.edit', $pharmacy->MedicineID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pharmacies.destroy', $pharmacy->MedicineID) }}" method="POST" style="display:inline;">
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
