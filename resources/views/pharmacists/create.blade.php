@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Pharmacist</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('pharmacists.form', ['route' => route('pharmacists.store'), 'method' => 'POST', 'pharmacist' => null])
</div>
@endsection
