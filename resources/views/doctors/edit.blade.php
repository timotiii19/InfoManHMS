@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Doctor</h2>
    <form action="{{ route('doctors.update', $doctor->DoctorID) }}" method="POST">
        @csrf
        @method('PUT')
        @include('doctors.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
