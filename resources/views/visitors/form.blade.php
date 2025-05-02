<div class="mb-3">
    <label>Visitor Name</label>
    <input type="text" name="visitor_name" class="form-control" value="{{ old('visitor_name', $visitor->visitor_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Relation to Patient</label>
    <input type="text" name="relation_to_patient" class="form-control" value="{{ old('relation_to_patient', $visitor->relation_to_patient ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Patient</label>
    <select name="patient_id" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient_id', $visitor->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Visit Time</label>
    <input type="datetime-local" name="visit_time" class="form-control" value="{{ old('visit_time', isset($visitor) ? date('Y-m-d\TH:i', strtotime($visitor->visit_time)) : '') }}" required>
</div>

<div class="mb-3">
    <label>Purpose</label>
    <input type="text" name="purpose" class="form-control" value="{{ old('purpose', $visitor->purpose ?? '') }}">
</div>
