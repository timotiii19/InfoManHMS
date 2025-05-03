@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Doctor</h2>
    <form action="{{ route('doctors.store') }}" method="POST">@csrf
        @include('doctors.form')
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
