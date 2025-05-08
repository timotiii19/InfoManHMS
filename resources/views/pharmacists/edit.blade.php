@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pharmacist</h2>
    <form method="POST" action="{{ route('pharmacists.update', $pharmacist->PharmacistID) }}">
        @csrf
        @method('PUT')
        @include('pharmacists.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
