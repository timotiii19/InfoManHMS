@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Emergency Record</h2>
    <form method="POST" action="{{ route('emergencies.store') }}">
        @csrf
        @include('emergencies.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
