@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Medicine</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('pharmacy.store') }}">
        @csrf

        @include('pharmacy.form')

        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
