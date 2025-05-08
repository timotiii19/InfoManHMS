<div class="mb-3">
    <label for="PatientID">Patient</label>
    <select name="PatientID" id="PatientID" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $patientMedication->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="MedicineID">Medicine</label>
    <select name="MedicineID" id="MedicineID" class="form-control" required>
        @foreach($medicines as $medicine)
            <option value="{{ $medicine->MedicineID }}" @if(old('MedicineID', $patientMedication->MedicineID ?? '') == $medicine->MedicineID) selected @endif>
                {{ $medicine->MedicineName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DoctorID">Doctor</label>
    <select name="DoctorID" id="DoctorID" class="form-control" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->DoctorID }}" @if(old('DoctorID', $patientMedication->DoctorID ?? '') == $doctor->DoctorID) selected @endif>
                {{ $doctor->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="Dosage">Dosage</label>
    <input type="text" name="Dosage" id="Dosage" class="form-control" value="{{ old('Dosage', $patientMedication->Dosage ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Frequency">Frequency</label>
    <input type="text" name="Frequency" id="Frequency" class="form-control" value="{{ old('Frequency', $patientMedication->Frequency ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="StartDate">Start Date</label>
    <input type="date" name="StartDate" id="StartDate" class="form-control" value="{{ old('StartDate', $patientMedication->StartDate ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="EndDate">End Date</label>
    <input type="date" name="EndDate" id="EndDate" class="form-control" value="{{ old('EndDate', $patientMedication->EndDate ?? '') }}" required>
</div>
