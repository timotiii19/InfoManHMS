@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Medical History Report: {{ $patient->name }}</h3>

    <h5>Medications</h5>
    <table class="table">
        <thead><tr><th>Medication</th><th>Date Prescribed</th></tr></thead>
        <tbody>
            @forelse($medications as $med)
            <tr><td>{{ $med->medication_name }}</td><td>{{ $med->prescribed_at }}</td></tr>
            @empty
            <tr><td colspan="2">No records.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h5>Lab Results</h5>
    <table class="table">
        <thead><tr><th>Test</th><th>Result</th><th>Date</th></tr></thead>
        <tbody>
            @forelse($labResults as $lab)
            <tr><td>{{ $lab->test_name }}</td><td>{{ $lab->result }}</td><td>{{ $lab->performed_at }}</td></tr>
            @empty
            <tr><td colspan="3">No lab tests.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h5>Inpatient Records</h5>
    <table class="table">
        <thead><tr><th>Room</th><th>Admission</th><th>Discharge</th></tr></thead>
        <tbody>
            @forelse($inpatients as $ip)
            <tr><td>{{ $ip->room }}</td><td>{{ $ip->admitted_at }}</td><td>{{ $ip->discharged_at ?? 'N/A' }}</td></tr>
            @empty
            <tr><td colspan="3">No inpatient stays.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
