<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $appointment->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Doctor</label>
    <select name="DoctorID" class="form-control" required>
        <option value="">Select Doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->DoctorID }}" @if(old('DoctorID', $appointment->DoctorID ?? '') == $doctor->DoctorID) selected @endif>
                {{ $doctor->FirstName }} {{ $doctor->LastName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Department</label>
    <select name="DepartmentID" class="form-control" required>
        <option value="">Select Department</option>
        @foreach($departments as $department)
            <option value="{{ $department->DepartmentID }}" @if(old('DepartmentID', $appointment->DepartmentID ?? '') == $department->DepartmentID) selected @endif>
                {{ $department->DepartmentName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Visit Date</label>
    <input type="datetime-local" name="VisitDate" class="form-control" value="{{ old('VisitDate', isset($appointment) ? $appointment->VisitDate->format('Y-m-d\TH:i') : '') }}" required>
</div>
<div class="mb-3">
    <label>Reason</label>
    <textarea name="Reason" class="form-control">{{ old('Reason', $appointment->Reason ?? '') }}</textarea>
</div>
