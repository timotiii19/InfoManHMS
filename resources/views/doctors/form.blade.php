<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Specialization</label>
    <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $doctor->specialization ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email ?? '') }}">
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone ?? '') }}">
</div>
