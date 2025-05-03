@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Room Occupancy Report</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>Occupied</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->type }}</td>
                <td>{{ $location->capacity }}</td>
                <td>{{ $location->inpatients_count }}</td>
                <td>{{ $location->capacity - $location->inpatients_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
