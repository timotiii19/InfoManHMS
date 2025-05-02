<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="DepartmentName" class="form-label">Department Name</label>
        <input type="text" name="DepartmentName" class="form-control" value="{{ old('DepartmentName', $department->DepartmentName ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="DepartmentRoom" class="form-label">Department Room</label>
        <input type="text" name="DepartmentRoom" class="form-control" value="{{ old('DepartmentRoom', $department->DepartmentRoom ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
