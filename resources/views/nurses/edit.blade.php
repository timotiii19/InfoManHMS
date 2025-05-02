@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Nurse: {{ $nurse->name }}</h3>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    @include('nurses.form', [
        'route' => route('nurses.update', $nurse->id),
        'method' => 'PUT',
        'nurse' => $nurse
    ])
</div>
@endsection
