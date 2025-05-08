@extends('layouts.app')

@section('title', 'Admit a New Patient')

@section('content')
    <h2 class="mb-4 text-center">Admit a New Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="FullName">Full Name</label>
            <input type="text" class="form-control" id="FullName" name="FullName" required>
        </div>

        <div class="form-group">
            <label for="DateOfBirth">Date of Birth</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
        </div>

        <div class="form-group">
            <label for="Sex">Sex</label>
            <select class="form-control" id="Sex" name="Sex" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
        </div>

        <div class="form-group">
            <label for="ContactNumber">Contact Number</label>
            <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" required>
        </div>

        <div class="form-group">
            <label for="PatientType">Patient Type</label>
            <select class="form-control" id="PatientType" name="PatientType" required>
                <option value="Outpatient">Outpatient</option>
                <option value="Inpatient">Inpatient</option>
            </select>
        </div>

        <div class="form-group">
            <label for="LocationID">Location</label>
            <select class="form-control" id="LocationID" name="LocationID" required>
                @foreach($locations as $location)
                    <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
