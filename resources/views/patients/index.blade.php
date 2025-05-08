@extends('layouts.app')

@section('title', 'Patients')

@section('content')
    <h2 class="mb-4 text-center">Patients List</h2>

    <!-- Patients Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->PatientID }}</td>
                        <td>{{ $patient->Name }}</td>
                        <td>{{ $patient->PatientType }}</td>
                        <td>
                            <!-- Inpatient Button -->
                            <form action="{{ route('patients.assignInpatient', $patient->PatientID) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Assign as Inpatient</button>
                            </form>

                            <!-- Outpatient Button -->
                            <form action="{{ route('patients.assignOutpatient', $patient->PatientID) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">Assign as Outpatient</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
