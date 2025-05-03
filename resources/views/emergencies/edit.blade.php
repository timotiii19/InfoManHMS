@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Emergency Record</h2>
    <form method="POST" action="{{ route('emergencies.update', $emergency) }}">
        @csrf
        @method('PUT')
        @include('emergencies.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
