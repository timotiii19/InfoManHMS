@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Pharmacist</h2>
    <form method="POST" action="{{ route('pharmacists.store') }}">
        @csrf
        @include('pharmacists.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
