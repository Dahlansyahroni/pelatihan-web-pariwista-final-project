@extends('admin.master')

@section('content')
    <h1>Edit Zone</h1>
    <hr>
    <form action="{{ route('admin.zones.update', $zone) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $zone->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $zone->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="price_range" class="form-label">Price Range</label>
            <input type="text" class="form-control" id="price_range" name="price_range" value="{{ old('price_range', $zone->price_range) }}" required>
            @error('price_range') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image (Leave empty to keep current image)</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($zone->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $zone->image) }}" alt="{{ $zone->name }}" width="150">
                </div>
            @endif
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Zone</button>
        <a href="{{ route('admin.zones.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
