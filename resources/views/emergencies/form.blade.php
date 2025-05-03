<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}"
                {{ old('PatientID', $emergency->PatientID ?? '') == $patient->PatientID ? 'selected' : '' }}>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Condition</label>
    <input type="text" name="Condition" class="form-control" value="{{ old('Condition', $emergency->Condition ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Arrival Time</label>
    <input type="datetime-local" name="ArrivalTime" class="form-control" value="{{ old('ArrivalTime', isset($emergency->ArrivalTime) ? date('Y-m-d\TH:i', strtotime($emergency->ArrivalTime)) : '') }}" required>
</div>

<div class="mb-3">
    <label>Actions Taken</label>
    <textarea name="ActionsTaken" class="form-control">{{ old('ActionsTaken', $emergency->ActionsTaken ?? '') }}</textarea>
</div>
