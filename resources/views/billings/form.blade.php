<div class="mb-3">
    <label for="patient_id" class="form-label">Patient ID</label>
    <input type="number" name="patient_id" id="patient_id" class="form-control"
           value="{{ old('patient_id', $billing->patient_id ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="text" name="amount" id="amount" class="form-control"
           value="{{ old('amount', $billing->amount ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="billing_date" class="form-label">Billing Date</label>
    <input type="date" name="billing_date" id="billing_date" class="form-control"
           value="{{ old('billing_date', isset($billing->billing_date) ? $billing->billing_date->format('Y-m-d') : '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" id="description" class="form-control"
           value="{{ old('description', $billing->description ?? '') }}">
</div>
