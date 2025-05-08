<div class="mb-3">
    <label for="PatientID">Patient</label>
    <select name="PatientID" id="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $inpatient->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DoctorID">Doctor</label>
    <select name="DoctorID" id="DoctorID" class="form-control" required>
        <option value="">Select Doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->DoctorID }}" @if(old('DoctorID', $inpatient->DoctorID ?? '') == $doctor->DoctorID) selected @endif>
                {{ $doctor->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DepartmentID">Department</label>
    <select name="DepartmentID" id="DepartmentID" class="form-control" required>
        <option value="">Select Department</option>
        @foreach($departments as $department)
            <option value="{{ $department->DepartmentID }}" @if(old('DepartmentID', $inpatient->DepartmentID ?? '') == $department->DepartmentID) selected @endif>
                {{ $department->DepartmentName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="LocationID">Location</label>
    <select name="LocationID" id="LocationID" class="form-control" required>
        <option value="">Select Location</option>
        @foreach($locations as $location)
            <option value="{{ $location->LocationID }}" @if(old('LocationID', $inpatient->LocationID ?? '') == $location->LocationID) selected @endif>
                {{ $location->LocationName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="Availability">Availability</label>
    <input type="text" name="Availability" id="Availability" class="form-control" value="{{ old('Availability', $inpatient->Availability ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="MedicalRecord">Medical Record</label>
    <textarea name="MedicalRecord" id="MedicalRecord" class="form-control" required>{{ old('MedicalRecord', $inpatient->MedicalRecord ?? '') }}</textarea>
</div>
