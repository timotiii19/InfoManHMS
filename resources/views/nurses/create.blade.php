@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Nurse</h2>
    <form method="POST" action="{{ route('nurses.store') }}">
        @csrf
        @include('nurses.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
