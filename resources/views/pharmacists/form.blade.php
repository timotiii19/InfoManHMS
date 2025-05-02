<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $pharmacist->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $pharmacist->contact_number ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
