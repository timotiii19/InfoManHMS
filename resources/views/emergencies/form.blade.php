<div class="mb-3">
    <label for="PatientID">Patient</label>
    <select name="PatientID" id="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $emergency->PatientID ?? '') == $patient->PatientID) selected @endif>
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
            <option value="{{ $doctor->DoctorID }}" @if(old('DoctorID', $emergency->DoctorID ?? '') == $doctor->DoctorID) selected @endif>
                {{ $doctor->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="NurseID">Nurse</label>
    <select name="NurseID" id="NurseID" class="form-control" required>
        <option value="">Select Nurse</option>
        @foreach($nurses as $nurse)
            <option value="{{ $nurse->NurseID }}" @if(old('NurseID', $emergency->NurseID ?? '') == $nurse->NurseID) selected @endif>
                {{ $nurse->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DateTime">Date and Time</label>
    <input type="datetime-local" name="DateTime" id="DateTime" class="form-control" value="{{ old('DateTime', $emergency->DateTime ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="EmergencyType">Emergency Type</label>
    <input type="text" name="EmergencyType" id="EmergencyType" class="form-control" value="{{ old('EmergencyType', $emergency->EmergencyType ?? '') }}" required>
</div>
