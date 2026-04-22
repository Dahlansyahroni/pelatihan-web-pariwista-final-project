@extends('admin.master')

@section('content')
    <h1>Zone Details</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $zone->name }}</h5>
            <p class="card-text"><strong>Price Range:</strong> {{ $zone->price_range }}</p>
            <p class="card-text"><strong>Description:</strong><br> {{ $zone->description ?? 'No description' }}</p>
            
            @if($zone->image)
                <div class="mt-3">
                    <strong>Image:</strong><br>
                    <img src="{{ asset('storage/' . $zone->image) }}" alt="{{ $zone->name }}" class="img-fluid mt-2" style="max-width: 400px;">
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.zones.edit', $zone) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.zones.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
