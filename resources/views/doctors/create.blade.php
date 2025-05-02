@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Doctor</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')
    
    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf
        <input type="text" name="DoctorName" class="form-control mb-2" placeholder="Doctor Name" required>
        <input type="email" name="Email" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="Availability" class="form-control mb-2" placeholder="Availability" required>
        <input type="text" name="ContactNumber" class="form-control mb-2" placeholder="Contact Number" required>
        <select name="DoctorType" class="form-control mb-2" required>
            <option value="">Select Doctor Type</option>
            <option value="Regular">Regular</option>
            <option value="Visiting">Visiting</option>
        </select>
        <input type="number" name="DepartmentID" class="form-control mb-2" placeholder="Department ID" required>
        <input type="number" name="LocationID" class="form-control mb-2" placeholder="Location ID" required>
        <select name="RoomType" class="form-control mb-2" required>
            <option value="">Select Room Type</option>
            <option value="Ward">Ward</option>
            <option value="Private">Private</option>
            <option value="Semi-Private">Semi-Private</option>
        </select>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
