@extends('admin.master')

@section('content')
    <h1>Create Attraction</h1>
    <hr>
    <form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone</label>
            <select class="form-control" id="zone_id" name="zone_id" required>
                <option value="">Select Zone</option>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}" {{ old('zone_id') == $zone->id ? 'selected' : '' }}>
                        {{ $zone->name }}
                    </option>
                @endforeach
            </select>
            @error('zone_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="opening_hours" class="form-label">Opening Hours</label>
                    <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours') }}" placeholder="e.g. 08:00 - 17:00">
                    @error('opening_hours') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location / Address</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Feature this attraction
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Attraction</button>
        <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
