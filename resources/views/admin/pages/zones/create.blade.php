@extends('admin.master')

@section('content')
    <h1>Create Zone</h1>
    <hr>
    <form action="{{ route('admin.zones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
        <div class="mb-3">
            <label for="price_range" class="form-label">Price Range</label>
            <input type="text" class="form-control" id="price_range" name="price_range" value="{{ old('price_range') }}" required>
            @error('price_range') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Zone</button>
        <a href="{{ route('admin.zones.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
