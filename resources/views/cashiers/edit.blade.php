@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Cashier</h2>
    <form method="POST" action="{{ route('cashiers.update', $cashier) }}">
        @csrf
        @method('PUT')
        @include('cashiers.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
