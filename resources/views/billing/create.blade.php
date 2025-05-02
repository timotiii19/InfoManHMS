@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Billing</h2>
    <form method="POST" action="{{ route('billings.store') }}">
        @csrf
        <select name="patient_id" class="form-control mb-2" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
        <input type="number" name="doctor_fee" placeholder="Doctor Fee" step="0.01" class="form-control mb-2" required>
        <input type="number" name="medicine_cost" placeholder="Medicine Cost" step="0.01" class="form-control mb-2" required>
        <input type="date" name="payment_date" class="form-control mb-2" required>
        <input type="text" name="receipt" placeholder="Receipt Number" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Generate Bill</button>
    </form>
</div>
@endsection
