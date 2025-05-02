@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Billing</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('billing.form', ['route' => route('billing.store'), 'method' => 'POST', 'billing' => null])
</div>
@endsection
