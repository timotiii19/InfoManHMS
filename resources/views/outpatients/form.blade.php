<div class="mb-3">
    <label>Patient</label>
    <select name="patient_id" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient_id', $outpatient->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Visit Date</label>
    <input type="date" name="visit_date" class="form-control" value="{{ old('visit_date', $outpatient->visit_date ?? '') }}" required>
</div>
