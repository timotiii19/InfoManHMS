@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create Billing</h1>

    <form method="POST" action="{{ route('billings.store') }}">
        @csrf
        @include('billings.form')

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
