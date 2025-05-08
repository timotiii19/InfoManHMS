<div class="mb-3">
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $nurse->Name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="DepartmentID">Department</label>
    <select name="DepartmentID" id="DepartmentID" class="form-control" required>
        @foreach($departments as $department)
            <option value="{{ $department->DepartmentID }}" @if(old('DepartmentID', $nurse->DepartmentID ?? '') == $department->DepartmentID) selected @endif>
                {{ $department->DepartmentName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="Email">Email</label>
    <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email', $nurse->Email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Availability">Availability</label>
    <input type="text" name="Availability" id="Availability" class="form-control" value="{{ old('Availability', $nurse->Availability ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="ContactNumber">Contact Number</label>
    <input type="text" name="ContactNumber" id="ContactNumber" class="form-control" value="{{ old('ContactNumber', $nurse->ContactNumber ?? '') }}" required>
</div>
