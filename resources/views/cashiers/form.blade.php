<div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $cashier->Name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $cashier->Email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone Number</label>
    <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber', $cashier->PhoneNumber ?? '') }}" required>
</div>
