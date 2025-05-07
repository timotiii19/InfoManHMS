@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Outpatient</h2>
    <form method="POST" action="{{ route('outpatients.update', $outpatient) }}">
        @csrf
        @method('PUT')
        @include('outpatients.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
