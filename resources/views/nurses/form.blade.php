<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName', $nurse->FirstName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="LastName" class="form-control" value="{{ old('LastName', $nurse->LastName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Gender</label>
    <select name="Gender" class="form-control" required>
        <option value="Male" @selected(old('Gender', $nurse->Gender ?? '') == 'Male')>Male</option>
        <option value="Female" @selected(old('Gender', $nurse->Gender ?? '') == 'Female')>Female</option>
    </select>
</div>
<div class="mb-3">
    <label>Date of Birth</label>
    <input type="date" name="DateOfBirth" class="form-control" value="{{ old('DateOfBirth', $nurse->DateOfBirth ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="Phone" class="form-control" value="{{ old('Phone', $nurse->Phone ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $nurse->Email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Address</label>
    <input type="text" name="Address" class="form-control" value="{{ old('Address', $nurse->Address ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Department</label>
    <input type="text" name="Department" class="form-control" value="{{ old('Department', $nurse->Department ?? '') }}" required>
</div>
