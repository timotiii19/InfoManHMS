<div class="mb-3">
    <label>Patient</label>
    <select name="patient_id" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient_id', $emergency->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Emergency Type</label>
    <input type="text" name="emergency_type" class="form-control" value="{{ old('emergency_type', $emergency->emergency_type ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Reported Time</label>
    <input type="datetime-local" name="reported_time" class="form-control" value="{{ old('reported_time', isset($emergency) ? date('Y-m-d\TH:i', strtotime($emergency->reported_time)) : '') }}" required>
</div>
