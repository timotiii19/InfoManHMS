@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Department</h2>
    <form method="POST" action="{{ route('department.store') }}">
        @csrf
        @include('department.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
