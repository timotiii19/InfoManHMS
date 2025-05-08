<div class="mb-3">
    <label for="RoomType">Room Type</label>
    <select name="RoomType" id="RoomType" class="form-control" required>
        <option value="Ward" @if(old('RoomType', $location->RoomType ?? '') == 'Ward') selected @endif>Ward</option>
        <option value="Private" @if(old('RoomType', $location->RoomType ?? '') == 'Private') selected @endif>Private</option>
        <option value="Semi-Private" @if(old('RoomType', $location->RoomType ?? '') == 'Semi-Private') selected @endif>Semi-Private</option>
    </select>
</div>

<div class="mb-3">
    <label for="RoomCapacity">Room Capacity</label>
    <input type="number" name="RoomCapacity" id="RoomCapacity" class="form-control" value="{{ old('RoomCapacity', $location->RoomCapacity ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Availability">Availability</label>
    <select name="Availability" id="Availability" class="form-control" required>
        <option value="Occupied" @if(old('Availability', $location->Availability ?? '') == 'Occupied') selected @endif>Occupied</option>
        <option value="Unoccupied" @if(old('Availability', $location->Availability ?? '') == 'Unoccupied') selected @endif>Unoccupied</option>
    </select>
</div>

<div class="mb-3">
    <label for="Building">Building</label>
    <input type="text" name="Building" id="Building" class="form-control" value="{{ old('Building', $location->Building ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Floor">Floor</label>
    <input type="number" name="Floor" id="Floor" class="form-control" value="{{ old('Floor', $location->Floor ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="RoomNumber">Room Number</label>
    <input type="number" name="RoomNumber" id="RoomNumber" class="form-control" value="{{ old('RoomNumber', $location->RoomNumber ?? '') }}" required>
</div>
