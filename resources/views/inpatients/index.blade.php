@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inpatients</h1>
    <a href="{{ route('inpatients.create') }}" class="btn btn-primary mb-3">Add Inpatient</a>
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inpatients as $inpatient)
                <tr>
                    <td>{{ $inpatient->patient->Name }}</td>
                    <td>{{ $inpatient->doctor->Name }}</td>
                    <td>{{ $inpatient->department->Name }}</td>
                    <td>{{ $inpatient->location->Name }}</td>
                    <td>{{ $inpatient->Availability }}</td>
                    <td>
                        <a href="{{ route('inpatients.edit', $inpatient->InpatientID) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('inpatients.destroy', $inpatient->InpatientID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
