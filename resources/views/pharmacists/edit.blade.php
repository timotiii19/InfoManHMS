@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Pharmacist</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('pharmacists.form', ['route' => route('pharmacists.update', $pharmacist->PharmacistID), 'method' => 'PUT', 'pharmacist' => $pharmacist])
</div>
@endsection
