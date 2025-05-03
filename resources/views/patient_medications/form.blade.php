<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @selected(old('PatientID', $patient_medication->PatientID ?? '') == $patient->PatientID)>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Medicine</label>
    <select name="PharmacyID" class="form-control" required>
        <option value="">Select Medicine</option>
        @foreach($pharmacies as $pharmacy)
            <option value="{{ $pharmacy->PharmacyID }}" @selected(old('PharmacyID', $patient_medication->PharmacyID ?? '') == $pharmacy->PharmacyID)>
                {{ $pharmacy->MedicineName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Dosage</label>
    <input type="text" name="Dosage" class="form-control" value="{{ old('Dosage', $patient_medication->Dosage ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Frequency</label>
    <input type="text" name="Frequency" class="form-control" value="{{ old('Frequency', $patient_medication->Frequency ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Duration</label>
    <input type="text" name="Duration" class="form-control" value="{{ old('Duration', $patient_medication->Duration ?? '') }}" required>
</div>
