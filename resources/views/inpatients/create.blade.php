@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Inpatient</h2>
    <form method="POST" action="{{ route('inpatients.store') }}">
        @csrf
        @include('inpatients.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
