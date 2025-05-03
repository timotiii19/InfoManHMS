@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Billing List</h1>

    <a href="{{ route('billings.create') }}" class="btn btn-primary mb-3">Add Billing</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($billings as $billing)
                <tr>
                    <td>{{ $billing->patient_id }}</td>
                    <td>{{ $billing->amount }}</td>
                    <td>{{ $billing->billing_date->format('Y-m-d') }}</td>
                    <td>{{ $billing->description }}</td>
                    <td>
                        <a href="{{ route('billings.edit', $billing) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No billing records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
