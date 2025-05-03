<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @selected(old('PatientID', $inpatient->PatientID ?? '') == $patient->PatientID)>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Admission Date</label>
    <input type="date" name="AdmissionDate" class="form-control" value="{{ old('AdmissionDate', $inpatient->AdmissionDate ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Discharge Date</label>
    <input type="date" name="DischargeDate" class="form-control" value="{{ old('DischargeDate', $inpatient->DischargeDate ?? '') }}">
</div>
<div class="mb-3">
    <label>Diagnosis</label>
    <input type="text" name="Diagnosis" class="form-control" value="{{ old('Diagnosis', $inpatient->Diagnosis ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Treatment</label>
    <input type="text" name="Treatment" class="form-control" value="{{ old('Treatment', $inpatient->Treatment ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Doctor</label>
    <input type="text" name="Doctor" class="form-control" value="{{ old('Doctor', $inpatient->Doctor ?? '') }}" required>
</div>
