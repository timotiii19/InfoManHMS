@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Visitor</h2>
    <form method="POST" action="{{ route('visitors.store') }}">
        @csrf
        <div class="mb-3">
            <label for="VisitorName">Visitor Name</label>
            <input type="text" name="VisitorName" class="form-control" value="{{ old('VisitorName') }}" required>
        </div>
        <div class="mb-3">
            <label for="Relationship">Relationship</label>
            <input type="text" name="Relationship" class="form-control" value="{{ old('Relationship') }}" required>
        </div>
        <div class="mb-3">
            <label for="VisitDateTime">Visit Date and Time</label>
            <input type="datetime-local" name="VisitDateTime" class="form-control" value="{{ old('VisitDateTime') }}" required>
        </div>
        <div class="mb-3">
            <label for="PatientID">Patient</label>
            <select name="PatientID" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->PatientID }}" @if(old('PatientID') == $patient->PatientID) selected @endif>
                        {{ $patient->Name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="LocationID">Location</label>
            <select name="LocationID" class="form-control" required>
                <option value="">Select Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location->LocationID }}" @if(old('LocationID') == $location->LocationID) selected @endif>
                        {{ $location->RoomNumber }} - {{ $location->Building }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ContactNumber">Contact Number</label>
            <input type="text" name="ContactNumber" class="form-control" value="{{ old('ContactNumber') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
