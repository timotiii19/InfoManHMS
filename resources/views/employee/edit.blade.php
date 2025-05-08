@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Employee</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->EmployeeID) }}" method="POST">
        @csrf
        @method('PUT')
        @include('employees.form', ['employee' => $employee])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
