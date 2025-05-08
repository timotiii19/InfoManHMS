@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Billing</h2>
    <form method="POST" action="{{ route('billing.store') }}">
        @csrf
        @include('billing.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
