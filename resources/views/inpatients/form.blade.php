<div class="mb-3">
    <label>Patient</label>
    <select name="patient_id" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient_id', $inpatient->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Room Number</label>
    <input type="text" name="room_number" class="form-control" value="{{ old('room_number', $inpatient->room_number ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Admission Date</label>
    <input type="date" name="admission_date" class="form-control" value="{{ old('admission_date', $inpatient->admission_date ?? '') }}" required>
</div>
