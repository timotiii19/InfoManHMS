@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Room to Location</h2>
    <form method="POST" action="{{ route('locations.store') }}">
        @csrf
        @include('locations.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
