<div class="mb-3">
    <label>Patient</label>
    <select name="PatientID" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->PatientID }}" @if(old('PatientID', $billing->PatientID ?? '') == $patient->PatientID) selected @endif>
                {{ $patient->FirstName }} {{ $patient->LastName }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Doctor Fee</label>
    <input type="number" name="DoctorFee" class="form-control" value="{{ old('DoctorFee', $billing->DoctorFee ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Medicine Cost</label>
    <input type="number" name="MedicineCost" class="form-control" value="{{ old('MedicineCost', $billing->MedicineCost ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Payment Date</label>
    <input type="date" name="PaymentDate" class="form-control" value="{{ old('PaymentDate', $billing->PaymentDate ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Receipt</label>
    <input type="text" name="Receipt" class="form-control" value="{{ old('Receipt', $billing->Receipt ?? '') }}" required>
</div>
