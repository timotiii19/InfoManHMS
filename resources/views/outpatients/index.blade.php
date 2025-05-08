@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Outpatients</h1>
    <a href="{{ route('outpatients.create') }}" class="btn btn-primary mb-3">Add Outpatient</a>
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Visit Date</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outpatients as $outpatient)
                <tr>
                    <td>{{ $outpatient->patient->Name }}</td>
                    <td>{{ $outpatient->doctor->Name }}</td>
                    <td>{{ $outpatient->department->Name }}</td>
                    <td>{{ $outpatient->VisitDate }}</td>
                    <td>{{ $outpatient->Reason }}</td>
                    <td>
                        <a href="{{ route('outpatients.edit', $outpatient->OutpatientID) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('outpatients.destroy', $outpatient->OutpatientID) }}" method="POST" style="display:inline;">
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
