<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="Name" value="{{ old('Name', $employee->Name ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="Email" value="{{ old('Email', $employee->Email ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Contact Number</label>
    <input type="text" name="ContactNumber" value="{{ old('ContactNumber', $employee->ContactNumber ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Employee Type</label>
    <select name="EmployeeType" class="form-control">
        @foreach(['Doctor', 'Nurse', 'Pharmacist', 'Cashier', 'Other'] as $type)
            <option value="{{ $type }}" {{ (old('EmployeeType', $employee->EmployeeType ?? '') == $type) ? 'selected' : '' }}>{{ $type }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Department</label>
    <select name="DepartmentID" class="form-control">
        <option value="">-- Select Department --</option>
        @foreach($departments as $dept)
            <option value="{{ $dept->DepartmentID }}" {{ (old('DepartmentID', $employee->DepartmentID ?? '') == $dept->DepartmentID) ? 'selected' : '' }}>
                {{ $dept->DepartmentName }}
            </option>
        @endforeach
    </select>
</div>
