<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Age</label>
    <input type="number" name="age" class="form-control" value="{{ old('age', $patient->age ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Gender</label>
    <select name="gender" class="form-control" required>
        <option value="Male" {{ old('gender', $patient->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender', $patient->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
    </select>
</div>
<div class="mb-3">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address ?? '') }}">
</div>
