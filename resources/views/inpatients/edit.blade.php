@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Inpatient</h2>
    <form method="POST" action="{{ route('inpatients.update', $inpatient->InpatientID) }}">
        @csrf
        @method('PUT')
        @include('inpatients.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
