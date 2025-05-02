@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Department</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    @include('departments.form', [
        'route' => route('departments.update', $department->id),
        'method' => 'PUT',
        'department' => $department
    ])
</div>
@endsection
