@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Billing</h2>
    <a href="{{ route('billing.create') }}" class="btn btn-primary mb-3">Add Billing</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient Name</th>
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
                <td>{{ $billing->patient->FirstName }} {{ $billing->patient->LastName }}</td>
                <td>${{ number_format($billing->DoctorFee, 2) }}</td>
                <td>${{ number_format($billing->MedicineCost, 2) }}</td>
                <td>${{ number_format($billing->TotalAmount, 2) }}</td>
                <td>{{ $billing->PaymentDate->format('Y-m-d') }}</td>
                <td>{{ $billing->Receipt }}</td>
                <td>
                    <a href="{{ route('billing.edit', $billing->BillingID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('billing.destroy', $billing->BillingID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this billing?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
