@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Lab Procedure</h2>
    <form method="POST" action="{{ route('labprocedures.store') }}">
        @csrf
        @include('labprocedures.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
