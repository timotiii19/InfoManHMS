@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Visitor</h2>
    <form method="POST" action="{{ route('visitors.update', $visitor) }}">
        @csrf
        @method('PUT')
        @include('visitors.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
