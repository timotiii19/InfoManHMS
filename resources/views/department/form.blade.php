<div class="mb-3">
    <label>Department Name</label>
    <input type="text" name="DepartmentName" class="form-control" value="{{ old('DepartmentName', $department->DepartmentName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Department Room</label>
    <input type="text" name="DepartmentRoom" class="form-control" value="{{ old('DepartmentRoom', $department->DepartmentRoom ?? '') }}" required>
</div>
