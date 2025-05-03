<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control">
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" {{ (old('PatientID', $appointment->PatientID ?? '') == $patient->PatientID) ? 'selected' : '' }}>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Doctor</label>
    <select name="DoctorID" class="form-control">
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->DoctorID }}" {{ (old('DoctorID', $appointment->DoctorID ?? '') == $doctor->DoctorID) ? 'selected' : '' }}>
                {{ $doctor->DoctorName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Appointment Date</label>
    <input type="date" name="AppointmentDate" class="form-control" value="{{ old('AppointmentDate', $appointment->AppointmentDate ?? '') }}">
</div>

<div class="mb-3">
    <label>Appointment Time</label>
    <input type="time" name="AppointmentTime" class="form-control" value="{{ old('AppointmentTime', $appointment->AppointmentTime ?? '') }}">
</div>

<div class="mb-3">
    <label>Status</label>
    <input type="text" name="Status" class="form-control" value="{{ old('Status', $appointment->Status ?? 'Scheduled') }}">
</div>
