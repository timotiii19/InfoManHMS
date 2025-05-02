<form action="{{ $route }}" method="POST">
    @csrf
    @if ($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label for="name" class="form-label">Nurse Name</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $nurse->name ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email', $nurse->email ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" class="form-select" required>
            <option value="">Select Department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    @if (old('department_id', $nurse->department_id ?? '') == $department->id) selected @endif>
                    {{ $department->DepartmentName }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="availability" class="form-label">Availability</label>
        <input type="text" name="availability" class="form-control" value="{{ old('availability', $nurse->availability ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="text" name="contactNumber" class="form-control" value="{{ old('contactNumber', $nurse->contactNumber ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
