@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Department</h2>
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        @include('departments.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
