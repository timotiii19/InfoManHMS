<div class="mb-3">
    <label>Location Name</label>
    <input type="text" name="LocationName" class="form-control" value="{{ old('LocationName', $location->LocationName ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Room Name</label>
    <input type="text" name="RoomName" class="form-control" value="{{ old('RoomName', $location->RoomName ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Room Type</label>
    <input type="text" name="RoomType" class="form-control" value="{{ old('RoomType', $location->RoomType ?? '') }}">
</div>

<div class="mb-3">
    <label>Capacity</label>
    <input type="number" name="Capacity" class="form-control" value="{{ old('Capacity', $location->Capacity ?? '') }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <input type="text" name="Description" class="form-control" value="{{ old('Description', $location->Description ?? '') }}">
</div>
