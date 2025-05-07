@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Medicine</h2>
    <form method="POST" action="{{ route('pharmacy.update', $pharmacy) }}">
        @csrf
        @method('PUT')
        @include('pharmacies.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
