@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Cashier</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    @include('cashiers.form', ['route' => route('cashiers.store'), 'method' => 'POST', 'cashier' => null])
</div>
@endsection
