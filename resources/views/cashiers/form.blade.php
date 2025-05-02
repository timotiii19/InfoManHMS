<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $cashier->name ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
