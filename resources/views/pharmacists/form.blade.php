<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName', $pharmacist->FirstName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="LastName" class="form-control" value="{{ old('LastName', $pharmacist->LastName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $pharmacist->Email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone Number</label>
    <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber', $pharmacist->PhoneNumber ?? '') }}" required>
</div>
