@extends('admin.master')

@section('content')
    <h1>Edit Attraction</h1>
    <hr>
    <form action="{{ route('admin.attractions.update', $attraction) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone</label>
            <select class="form-control" id="zone_id" name="zone_id" required>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}" {{ (old('zone_id', $attraction->zone_id) == $zone->id) ? 'selected' : '' }}>
                        {{ $zone->name }}
                    </option>
                @endforeach
            </select>
            @error('zone_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $attraction->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $attraction->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $attraction->price) }}">
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="opening_hours" class="form-label">Opening Hours</label>
                    <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $attraction->opening_hours) }}">
                    @error('opening_hours') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location / Address</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $attraction->location) }}">
            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="active" {{ old('status', $attraction->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $attraction->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $attraction->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Feature this attraction
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if ($attraction->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="200">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image">
            <small class="text-muted">Leave empty if you don't want to change the image.</small>
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Attraction</button>
        <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
