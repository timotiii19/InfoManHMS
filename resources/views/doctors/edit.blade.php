@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Doctor</h2>

    {{-- include our back button --}}
    @include('partials.back-to-dashboard')

    
    <form method="POST" action="{{ route('doctors.update', $doctor->DoctorID) }}">
        @csrf @method('PUT')
        <input type="text" name="DoctorName" value="{{ $doctor->DoctorName }}" class="form-control mb-2" required>
        <input type="email" name="Email" value="{{ $doctor->Email }}" class="form-control mb-2" required>
        <input type="text" name="Availability" value="{{ $doctor->Availability }}" class="form-control mb-2" required>
        <input type="text" name="ContactNumber" value="{{ $doctor->ContactNumber }}" class="form-control mb-2" required>
        <select name="DoctorType" class="form-control mb-2" required>
            <option value="Regular" {{ $doctor->DoctorType == 'Regular' ? 'selected' : '' }}>Regular</option>
            <option value="Visiting" {{ $doctor->DoctorType == 'Visiting' ? 'selected' : '' }}>Visiting</option>
        </select>
        <input type="number" name="DepartmentID" value="{{ $doctor->DepartmentID }}" class="form-control mb-2" required>
        <input type="number" name="LocationID" value="{{ $doctor->LocationID }}" class="form-control mb-2" required>
        <select name="RoomType" class="form-control mb-2" required>
            <option value="Ward" {{ $doctor->RoomType == 'Ward' ? 'selected' : '' }}>Ward</option>
            <option value="Private" {{ $doctor->RoomType == 'Private' ? 'selected' : '' }}>Private</option>
            <option value="Semi-Private" {{ $doctor->RoomType == 'Semi-Private' ? 'selected' : '' }}>Semi-Private</option>
        </select>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
