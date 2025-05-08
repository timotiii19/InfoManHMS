@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cashiers</h2>
    <a href="{{ route('cashiers.create') }}" class="btn btn-primary mb-3">Add Cashier</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cashier ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashiers as $cashier)
            <tr>
                <td>{{ $cashier->CashierID }}</td>
                <td>{{ $cashier->Name }}</td>
                <td>
                    <a href="{{ route('cashiers.edit', $cashier->CashierID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cashiers.destroy', $cashier->CashierID) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this cashier?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
