<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Patient</label>
        <select name="patient_id" class="form-select" required>
            <option value="">Select patient</option>
            @foreach($patients as $p)
                <option value="{{ $p->id }}"
                    {{ old('patient_id', $medication->patient_id ?? '') == $p->id ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Medicine</label>
        <select name="medicine_id" class="form-select" required>
            <option value="">Select medicine</option>
            @foreach($medicines as $m)
                <option value="{{ $m->MedicineID }}"
                    {{ old('medicine_id', $medication->medicine_id ?? '') == $m->MedicineID ? 'selected' : '' }}>
                    {{ $m->Description }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Doctor</label>
        <select name="doctor_id" class="form-select" required>
            <option value="">Select doctor</option>
            @foreach($doctors as $d)
                <option value="{{ $d->id }}"
                    {{ old('doctor_id', $medication->doctor_id ?? '') == $d->id ? 'selected' : '' }}>
                    {{ $d->DoctorName }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Dosage</label>
        <input type="text" name="dosage" class="form-control"
               value="{{ old('dosage', $medication->dosage ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Frequency</label>
        <input type="text" name="frequency" class="form-control"
               value="{{ old('frequency', $medication->frequency ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Start Date</label>
        <input type="date" name="StartDate" class="form-control"
               value="{{ old('StartDate', $medication->StartDate ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">End Date</label>
        <input type="date" name="EndDate" class="form-control"
               value="{{ old('EndDate', $medication->EndDate ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
