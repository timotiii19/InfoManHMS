<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName', $visitor->FirstName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="LastName" class="form-control" value="{{ old('LastName', $visitor->LastName ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone Number</label>
    <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber', $visitor->PhoneNumber ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Visit Date</label>
    <input type="date" name="VisitDate" class="form-control" value="{{ old('VisitDate', $visitor->VisitDate ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Visit Time</label>
    <input type="time" name="VisitTime" class="form-control" value="{{ old('VisitTime', $visitor->VisitTime ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $visitor->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>
