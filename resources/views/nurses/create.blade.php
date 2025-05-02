@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Nurse</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('nurses.form', ['route' => route('nurses.store'), 'method' => 'POST', 'nurse' => null])
</div>
@endsection
