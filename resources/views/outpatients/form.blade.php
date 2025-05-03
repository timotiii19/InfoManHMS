<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @selected(old('PatientID', $outpatient->PatientID ?? '') == $patient->PatientID)>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Visit Date</label>
    <input type="date" name="VisitDate" class="form-control" value="{{ old('VisitDate', $outpatient->VisitDate ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Diagnosis</label>
    <input type="text" name="Diagnosis" class="form-control" value="{{ old('Diagnosis', $outpatient->Diagnosis ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Treatment</label>
    <input type="text" name="Treatment" class="form-control" value="{{ old('Treatment', $outpatient->Treatment ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Doctor</label>
    <input type="text" name="Doctor" class="form-control" value="{{ old('Doctor', $outpatient->Doctor ?? '') }}" required>
</div>
