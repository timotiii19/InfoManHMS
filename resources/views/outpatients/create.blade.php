@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Outpatient</h2>
    <form method="POST" action="{{ route('outpatients.store') }}">
        @csrf
        @include('outpatients.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
