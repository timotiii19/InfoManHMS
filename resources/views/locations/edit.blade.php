@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Room</h2>
    <form method="POST" action="{{ route('locations.update', $location) }}">
        @csrf
        @method('PUT')
        @include('locations.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
