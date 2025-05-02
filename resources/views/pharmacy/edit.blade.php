@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Medicine</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('pharmacy.update', $pharmacy->id) }}">
        @csrf @method('PUT')

        @include('pharmacy.form', ['pharmacy' => $pharmacy])

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
