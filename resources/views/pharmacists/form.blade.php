@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($pharmacist) ? 'Edit Pharmacist' : 'Create Pharmacist' }}</h2>
    <form method="POST" action="{{ isset($pharmacist) ? route('pharmacists.update', $pharmacist->PharmacistID) : route('pharmacists.store') }}">
        @csrf
        @if(isset($pharmacist))
            @method('PUT')
        @endif
        
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ isset($pharmacist) ? $pharmacist->Name : old('Name') }}" required>
        </div>

        <div class="mb-3">
            <label for="ContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" value="{{ isset($pharmacist) ? $pharmacist->ContactNumber : old('ContactNumber') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($pharmacist) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
