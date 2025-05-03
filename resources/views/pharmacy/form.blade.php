<div class="mb-3">
    <label>Medicine Name</label>
    <input type="text" name="MedicineName" class="form-control" value="{{ old('MedicineName', $pharmacy->MedicineName ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Manufacturer</label>
    <input type="text" name="Manufacturer" class="form-control" value="{{ old('Manufacturer', $pharmacy->Manufacturer ?? '') }}">
</div>

<div class="mb-3">
    <label>Expiration Date</label>
    <input type="date" name="ExpirationDate" class="form-control" value="{{ old('ExpirationDate', $pharmacy->ExpirationDate ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Quantity</label>
    <input type="number" name="Quantity" class="form-control" value="{{ old('Quantity', $pharmacy->Quantity ?? 0) }}" required>
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number" name="Price" class="form-control" step="0.01" value="{{ old('Price', $pharmacy->Price ?? 0.00) }}" required>
</div>
