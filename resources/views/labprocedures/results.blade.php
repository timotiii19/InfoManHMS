@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Lab Procedure Results Report</h3>

    <form class="row g-3 mb-4" method="GET">
        <div class="col-auto">
            <label>Patient</label>
            <select name="patient_id" class="form-control">
                <option value="">All Patients</option>
                @foreach(App\Models\Patient::all() as $patient)
                <option value="{{ $patient->id }}" {{ $patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-auto">
            <label>From:</label>
            <input type="date" name="from" value="{{ $from }}" class="form-control">
        </div>
        <div class="col-auto">
            <label>To:</label>
            <input type="date" name="to" value="{{ $to }}" class="form-control">
        </div>
        <div class="col-auto align-self-end">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    @if($labProcedures->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Procedure Name</th>
                <th>Result</th>
                <th>Procedure Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labProcedures as $procedure)
            <tr>
                <td>{{ $procedure->patient->name }}</td>
                <td>{{ $procedure->procedure_name }}</td>
                <td>{{ $procedure->result }}</td>
                <td>{{ $procedure->procedure_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No lab procedure results found for the selected filters.</p>
    @endif
</div>
@endsection
