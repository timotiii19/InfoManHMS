@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Location</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('locations.form', ['route' => route('locations.store'), 'method' => 'POST', 'location' => null])
</div>
@endsection
