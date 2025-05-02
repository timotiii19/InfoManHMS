@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Billing Records</h3>
    <a href="{{ route('billing.create') }}" class="btn btn-primary mb-3">Add Billing</a>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor Fee</th>
                <th>Medicine Cost</th>
                <th>Total Amount</th>
                <th>Payment Date</th>
                <th>Receipt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billings as $billing)
            <tr>
                <td>{{ $billing->patient->name }}</td>
                <td>{{ $billing->doctor_fee }}</td>
                <td>{{ $billing->medicine_cost }}</td>
                <td>{{ $billing->total_amount }}</td>
                <td>{{ $billing->payment_date }}</td>
                <td>{{ $billing->receipt }}</td>
                <td>
                    <a href="{{ route('billing.edit', $billing->BillingID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('billing.destroy', $billing->BillingID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this record?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
