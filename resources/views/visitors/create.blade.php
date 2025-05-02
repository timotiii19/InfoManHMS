@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Visitor</h2>
    <form method="POST" action="{{ route('visitors.store') }}">
        @csrf

        @include('visitors.form')

        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
