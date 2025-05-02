@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Cashier</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('cashiers.form', ['route' => route('cashiers.update', $cashier->CashierID), 'method' => 'PUT', 'cashier' => $cashier])
</div>
@endsection
