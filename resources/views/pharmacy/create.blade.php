@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Medicine</h2>
    <form method="POST" action="{{ route('pharmacy.store') }}">
        @csrf
        <select name="pharmacist_id" class="form-control mb-2" required>
            @foreach($pharmacists as $pharmacist)
                <option value="{{ $pharmacist->id }}">{{ $pharmacist->name }}</option>
            @endforeach
        </select>
        <textarea name="description" class="form-control mb-2" placeholder="Description" required></textarea>
        <input type="number" name="stock_quantity" placeholder="Stock Quantity" class="form-control mb-2" required>
        <input type="number" name="price" placeholder="Price" step="0.01" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Add Medicine</button>
    </form>
</div>
@endsection
