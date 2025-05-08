@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Lab Procedure</h2>
    <form method="POST" action="{{ route('lab_procedures.store') }}">
        @csrf
        @include('lab_procedures.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
