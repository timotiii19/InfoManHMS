<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="RoomType" class="form-label">Room Type</label>
        <select name="RoomType" class="form-select" required>
            <option value="Ward" @if(old('RoomType', $location->RoomType ?? '') == 'Ward') selected @endif>Ward</option>
            <option value="Private" @if(old('RoomType', $location->RoomType ?? '') == 'Private') selected @endif>Private</option>
            <option value="Semi-Private" @if(old('RoomType', $location->RoomType ?? '') == 'Semi-Private') selected @endif>Semi-Private</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="RoomCapacity" class="form-label">Room Capacity</label>
        <input type="number" name="RoomCapacity" class="form-control" value="{{ old('RoomCapacity', $location->RoomCapacity ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="Availability" class="form-label">Availability</label>
        <select name="Availability" class="form-select" required>
            <option value="Occupied" @if(old('Availability', $location->Availability ?? '') == 'Occupied') selected @endif>Occupied</option>
            <option value="Unoccupied" @if(old('Availability', $location->Availability ?? '') == 'Unoccupied') selected @endif>Unoccupied</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="Building" class="form-label">Building</label>
        <input type="text" name="Building" class="form-control" value="{{ old('Building', $location->Building ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="Floor" class="form-label">Floor</label>
        <input type="number" name="Floor" class="form-control" value="{{ old('Floor', $location->Floor ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="RoomNumber" class="form-label">Room Number</label>
        <input type="number" name="RoomNumber" class="form-control" value="{{ old('RoomNumber', $location->RoomNumber ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
