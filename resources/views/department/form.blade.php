<div class="mb-3">
    <label>Department Name</label>
    <input type="text" name="DepartmentName" class="form-control" value="{{ old('DepartmentName', $department->DepartmentName ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <input type="text" name="Description" class="form-control" value="{{ old('Description', $department->Description ?? '') }}">
</div>
