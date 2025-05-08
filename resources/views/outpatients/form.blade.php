<div class="mb-3">
    <label for="PatientID">Patient</label>
    <select name="PatientID" id="PatientID" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" @if(old('PatientID', $outpatient->PatientID ?? '') == $patient->id) selected @endif>
                {{ $patient->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DoctorID">Doctor</label>
    <select name="DoctorID" id="DoctorID" class="form-control" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" @if(old('DoctorID', $outpatient->DoctorID ?? '') == $doctor->id) selected @endif>
                {{ $doctor->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DepartmentID">Department</label>
    <select name="DepartmentID" id="DepartmentID" class="form-control" required>
        @foreach($departments as $department)
            <option value="{{ $department->id }}" @if(old('DepartmentID', $outpatient->DepartmentID ?? '') == $department->id) selected @endif>
                {{ $department->DepartmentName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="VisitDate">Visit Date</label>
    <input type="datetime-local" name="VisitDate" id="VisitDate" class="form-control" value="{{ old('VisitDate', $outpatient->VisitDate ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Reason">Reason</label>
    <textarea name="Reason" id="Reason" class="form-control" required>{{ old('Reason', $outpatient->Reason ?? '') }}</textarea>
</div>
