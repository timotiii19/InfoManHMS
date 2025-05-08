@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Medicine</h2>
    <form method="POST" action="{{ route('pharmacies.store') }}">
        @csrf
        @include('pharmacies.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
