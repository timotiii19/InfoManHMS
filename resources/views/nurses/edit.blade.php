@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Nurse</h2>
    <form method="POST" action="{{ route('nurses.update', $nurse) }}">
        @csrf
        @method('PUT')
        @include('nurses.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
