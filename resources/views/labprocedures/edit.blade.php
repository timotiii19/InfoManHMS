@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lab Procedure</h2>
    <form method="POST" action="{{ route('labprocedures.update', $labprocedure) }}">
        @csrf
        @method('PUT')
        @include('labprocedures.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
