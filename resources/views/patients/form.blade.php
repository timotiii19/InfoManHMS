<div class="form-group">
    <label>First Name</label>
    <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName', $patient->FirstName ?? '') }}" required>
</div>
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="LastName" class="form-control" value="{{ old('LastName', $patient->LastName ?? '') }}" required>
</div>
<div class="form-group">
    <label>Gender</label>
    <select name="Gender" class="form-control" required>
        <option value="Male" {{ old('Gender', $patient->Gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('Gender', $patient->Gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ old('Gender', $patient->Gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>
<div class="form-group">
    <label>Date of Birth</label>
    <input type="date" name="DOB" class="form-control" value="{{ old('DOB', $patient->DOB ?? '') }}" required>
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="Phone" class="form-control" value="{{ old('Phone', $patient->Phone ?? '') }}">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" value="{{ old('Email', $patient->Email ?? '') }}">
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" name="Address" class="form-control" value="{{ old('Address', $patient->Address ?? '') }}">
</div>
<div class="form-group">
    <label>Location</label>
    <select name="LocationID" class="form-control">
        <option value="">-- Select Room --</option>
        @foreach($locations as $location)
            <option value="{{ $location->LocationID }}"
                {{ old('LocationID', $patient->LocationID ?? '') == $location->LocationID ? 'selected' : '' }}>
                {{ $location->RoomNumber }} - {{ $location->RoomType }}
            </option>
        @endforeach
    </select>
</div>
