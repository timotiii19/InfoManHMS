@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cashiers</h2>
    <a href="{{ route('cashiers.create') }}" class="btn btn-primary mb-3">Add Cashier</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashiers as $cashier)
            <tr>
                <td>{{ $cashier->FirstName }}</td>
                <td>{{ $cashier->LastName }}</td>
                <td>{{ $cashier->Email }}</td>
                <td>{{ $cashier->PhoneNumber }}</td>
                <td>
                    <a href="{{ route('cashiers.edit', $cashier) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cashiers.destroy', $cashier) }}" method="POST" class="d-inline">
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
