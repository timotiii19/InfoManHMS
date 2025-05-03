<div class="mb-3">
    <label>Name</label>
    <input type="text" name="DoctorName" class="form-control" value="{{ old('DoctorName', $doctor->DoctorName ?? '') }}">
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $doctor->Email ?? '') }}">
</div>
<div class="mb-3">
    <label>Contact Number</label>
    <input type="text" name="ContactNumber" class="form-control" value="{{ old('ContactNumber', $doctor->ContactNumber ?? '') }}">
</div>
<div class="mb-3">
    <label>Doctor Type</label>
    <select name="DoctorType" class="form-control">
        <option value="Regular" {{ (old('DoctorType', $doctor->DoctorType ?? '') == 'Regular') ? 'selected' : '' }}>Regular</option>
        <option value="Visiting" {{ (old('DoctorType', $doctor->DoctorType ?? '') == 'Visiting') ? 'selected' : '' }}>Visiting</option>
    </select>
</div>
<div class="mb-3">
    <label>Availability</label>
    <input type="text" name="Availability" class="form-control" value="{{ old('Availability', $doctor->Availability ?? '') }}">
</div>
<div class="mb-3">
    <label>Room Type</label>
    <select name="RoomType" class="form-control">
        <option value="Ward">Ward</option>
        <option value="Private">Private</option>
        <option value="Semi-Private">Semi-Private</option>
    </select>
</div>
<div class="mb-3">
    <label>Department</label>
    <select name="DepartmentID" class="form-control">
        @foreach($departments as $dept)
        <option value="{{ $dept->DepartmentID }}" {{ (old('DepartmentID', $doctor->DepartmentID ?? '') == $dept->DepartmentID) ? 'selected' : '' }}>{{ $dept->DepartmentName }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Location</label>
    <select name="LocationID" class="form-control">
        @foreach($locations as $loc)
        <option value="{{ $loc->LocationID }}" {{ (old('LocationID', $doctor->LocationID ?? '') == $loc->LocationID) ? 'selected' : '' }}>{{ $loc->Building }} - Room {{ $loc->RoomNumber }}</option>
        @endforeach
    </select>
</div>
