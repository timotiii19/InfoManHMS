@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Department</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('departments.form', [
        'route' => route('departments.store'),
        'method' => 'POST',
        'department' => null
    ])
</div>
@endsection
