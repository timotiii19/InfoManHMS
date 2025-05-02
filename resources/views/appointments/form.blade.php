<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label>Patient</label>
        <select name="patient_id" class="form-select" required>
            <option value="">-- Select Patient --</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->PatientID }}" {{ old('patient_id', $appointment->patient_id ?? '') == $patient->PatientID ? 'selected' : '' }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Doctor</label>
        <select name="doctor_id" class="form-select" required>
            <option value="">-- Select Doctor --</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->DoctorID }}" {{ old('doctor_id', $appointment->doctor_id ?? '') == $doctor->DoctorID ? 'selected' : '' }}>
                    {{ $doctor->DoctorName }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="appointment_date" class="form-control"
               value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Time</label>
        <input type="time" name="appointment_time" class="form-control"
               value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
            <option value="Scheduled" {{ (old('status', $appointment->status ?? '') == 'Scheduled') ? 'selected' : '' }}>Scheduled</option>
            <option value="Completed" {{ (old('status', $appointment->status ?? '') == 'Completed') ? 'selected' : '' }}>Completed</option>
            <option value="Cancelled" {{ (old('status', $appointment->status ?? '') == 'Cancelled') ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Notes</label>
        <textarea name="notes" class="form-control">{{ old('notes', $appointment->notes ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
