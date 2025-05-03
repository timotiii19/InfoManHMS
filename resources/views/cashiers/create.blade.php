@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Cashier</h2>
    <form method="POST" action="{{ route('cashiers.store') }}">
        @csrf
        @include('cashiers.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
