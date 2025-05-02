@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Cashiers</h3>
    <a href="{{ route('cashiers.create') }}" class="btn btn-primary mb-3">Add Cashier</a>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashiers as $cashier)
            <tr>
                <td>{{ $cashier->name }}</td>
                <td>
                    <a href="{{ route('cashiers.edit', $cashier->CashierID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('cashiers.destroy', $cashier->CashierID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this cashier?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
