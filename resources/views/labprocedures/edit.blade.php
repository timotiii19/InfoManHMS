@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lab Procedure</h2>
    <form method="POST" action="{{ route('lab_procedures.update', $labProcedure->LabProcedureID) }}">
        @csrf
        @method('PUT')
        @include('lab_procedures.form')  <!-- Include the form partial for input fields -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
