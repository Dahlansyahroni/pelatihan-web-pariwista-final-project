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

    <div class="mt-4">
        <h3>Attractions in this Zone</h3>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($zone->attractions as $attraction)
                    <tr>
                        <td>{{ $attraction->name }}</td>
                        <td>{{ $attraction->price ?? '-' }}</td>
                        <td>
                            @if ($attraction->image)
                                <img src="{{ asset('storage/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="80">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.attractions.show', $attraction) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No attractions found in this zone.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
