@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Department</h2>
    <form method="POST" action="{{ route('department.update', $department->DepartmentID) }}">
        @csrf
        @method('PUT')
        @include('department.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
