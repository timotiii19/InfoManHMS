@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Billing Summary Report</h3>

    <form class="row g-3 mb-4" method="GET">
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

    @foreach($billings as $patientName => $entries)
    <div class="card mb-3">
        <div class="card-header">
            {{ $patientName }}
        </div>
        <ul class="list-group list-group-flush">
            @php $total = 0; @endphp
            @foreach($entries as $entry)
            <li class="list-group-item d-flex justify-content-between">
                {{ $entry->description }}
                <span>{{ number_format($entry->amount, 2) }}</span>
            </li>
            @php $total += $entry->amount; @endphp
            @endforeach
            <li class="list-group-item d-flex justify-content-between fw-bold">
                Total<span>{{ number_format($total, 2) }}</span>
            </li>
        </ul>
    </div>
    @endforeach
</div>
@endsection
