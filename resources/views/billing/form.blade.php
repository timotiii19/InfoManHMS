<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label for="patient_id" class="form-label">Patient</label>
        <select name="patient_id" class="form-select" required>
            <option value="">Select Patient</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" {{ old('patient_id', $billing->patient_id ?? '') == $patient->id ? 'selected' : '' }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="doctor_fee" class="form-label">Doctor Fee</label>
        <input type="number" name="doctor_fee" class="form-control" value="{{ old('doctor_fee', $billing->doctor_fee ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="medicine_cost" class="form-label">Medicine Cost</label>
        <input type="number" name="medicine_cost" class="form-control" value="{{ old('medicine_cost', $billing->medicine_cost ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="total_amount" class="form-label">Total Amount</label>
        <input type="number" name="total_amount" class="form-control" value="{{ old('total_amount', $billing->total_amount ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="payment_date" class="form-label">Payment Date</label>
        <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $billing->payment_date ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="receipt" class="form-label">Receipt</label>
        <input type="text" name="receipt" class="form-control" value="{{ old('receipt', $billing->receipt ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
