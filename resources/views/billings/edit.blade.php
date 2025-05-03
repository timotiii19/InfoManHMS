@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Billing</h1>

    <form action="{{ route('billings.update', $billing->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('billings.form', ['billing' => $billing])

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
