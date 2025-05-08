<div class="mb-3">
    <label for="PatientID">Patient</label>
    <select name="PatientID" id="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $labProcedure->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="DoctorID">Doctor</label>
    <select name="DoctorID" id="DoctorID" class="form-control" required>
        <option value="">Select Doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->DoctorID }}" @if(old('DoctorID', $labProcedure->DoctorID ?? '') == $doctor->DoctorID) selected @endif>
                {{ $doctor->FullName }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="TestDate">Test Date</label>
    <input type="datetime-local" name="TestDate" id="TestDate" class="form-control" value="{{ old('TestDate', $labProcedure->TestDate ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Result">Result</label>
    <textarea name="Result" id="Result" class="form-control" required>{{ old('Result', $labProcedure->Result ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="DateReleased">Date Released</label>
    <input type="date" name="DateReleased" id="DateReleased" class="form-control" value="{{ old('DateReleased', $labProcedure->DateReleased ?? '') }}" required>
</div>
