@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Location</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('locations.form', ['route' => route('locations.update', $location->id), 'method' => 'PUT', 'location' => $location])
</div>
@endsection
