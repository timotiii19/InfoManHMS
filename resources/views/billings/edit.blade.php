@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Billing</h2>
    <form method="POST" action="{{ route('billing.update', $billing->BillingID) }}">
        @csrf
        @method('PUT')
        @include('billing.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
