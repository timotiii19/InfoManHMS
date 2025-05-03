<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}"
                {{ old('PatientID', $labprocedure->PatientID ?? '') == $patient->PatientID ? 'selected' : '' }}>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Procedure Type</label>
    <input type="text" name="ProcedureType" class="form-control"
           value="{{ old('ProcedureType', $labprocedure->ProcedureType ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Procedure Date</label>
    <input type="date" name="ProcedureDate" class="form-control"
           value="{{ old('ProcedureDate', $labprocedure->ProcedureDate ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Results</label>
    <textarea name="Results" class="form-control">{{ old('Results', $labprocedure->Results ?? '') }}</textarea>
</div>
