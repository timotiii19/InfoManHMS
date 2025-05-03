@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Medicine</h2>
    <form method="POST" action="{{ route('pharmacy.store') }}">
        @csrf
        @include('pharmacy.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
