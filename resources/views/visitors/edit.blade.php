@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Visitor</h2>
    <form method="POST" action="{{ route('visitors.update', $visitor->id) }}">
        @csrf @method('PUT')

        @include('visitors.form', ['visitor' => $visitor])

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
