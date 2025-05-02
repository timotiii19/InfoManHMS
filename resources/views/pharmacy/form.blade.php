<div class="mb-3">
    <label>Medicine Name</label>
    <input type="text" name="medicine_name" class="form-control" value="{{ old('medicine_name', $pharmacy->medicine_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Manufacturer</label>
    <input type="text" name="manufacturer" class="form-control" value="{{ old('manufacturer', $pharmacy->manufacturer ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Batch No</label>
    <input type="text" name="batch_no" class="form-control" value="{{ old('batch_no', $pharmacy->batch_no ?? '') }}">
</div>

<div class="mb-3">
    <label>Quantity</label>
    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $pharmacy->quantity ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Unit</label>
    <input type="text" name="unit" class="form-control" value="{{ old('unit', $pharmacy->unit ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Expiry Date</label>
    <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $pharmacy->expiry_date ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="text" name="price" class="form-control" value="{{ old('price', $pharmacy->price ?? '') }}" required>
</div>
