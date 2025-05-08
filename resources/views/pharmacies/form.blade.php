<div class="mb-3">
    <label for="PharmacistID" class="form-label">Pharmacist</label>
    <select name="PharmacistID" class="form-control" required>
        <option value="">Select Pharmacist</option>
        @foreach($pharmacists as $pharmacist)
            <option value="{{ $pharmacist->PharmacistID }}" @if(old('PharmacistID', isset($pharmacy) ? $pharmacy->PharmacistID : '') == $pharmacist->PharmacistID) selected @endif>
                {{ $pharmacist->Name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="Description" class="form-label">Description</label>
    <textarea name="Description" class="form-control" required>{{ old('Description', isset($pharmacy) ? $pharmacy->Description : '') }}</textarea>
</div>

<div class="mb-3">
    <label for="StockQuantity" class="form-label">Stock Quantity</label>
    <input type="number" name="StockQuantity" class="form-control" value="{{ old('StockQuantity', isset($pharmacy) ? $pharmacy->StockQuantity : '') }}" required>
</div>

<div class="mb-3">
    <label for="Price" class="form-label">Price</label>
    <input type="number" name="Price" class="form-control" step="0.01" value="{{ old('Price', isset($pharmacy) ? $pharmacy->Price : '') }}" required>
</div>
