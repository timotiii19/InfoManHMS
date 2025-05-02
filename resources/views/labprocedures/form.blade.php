<div class="mb-3">
    <label>Patient</label>
    <select name="patient_id" class="form-control" required>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient_id', $labProcedure->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Test Name</label>
    <input type="text" name="test_name" class="form-control" value="{{ old('test_name', $labProcedure->test_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Results</label>
    <textarea name="results" class="form-control" rows="3">{{ old('results', $labProcedure->results ?? '') }}</textarea>
</div>
