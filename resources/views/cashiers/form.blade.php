<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName', $cashier->FirstName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="LastName" class="form-control" value="{{ old('LastName', $cashier->LastName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $cashier->Email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone Number</label>
    <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber', $cashier->PhoneNumber ?? '') }}" required>
</div>
