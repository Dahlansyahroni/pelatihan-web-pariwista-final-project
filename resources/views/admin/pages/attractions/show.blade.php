@extends('admin.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Attraction Details</h1>
        <div>
            <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            @if ($attraction->image)
                <img src="{{ asset('storage/' . $attraction->image) }}" alt="{{ $attraction->name }}" class="img-fluid rounded shadow">
            @else
                <div class="bg-light d-flex justify-content-center align-items-center rounded shadow" style="height: 200px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif

            <div class="mt-3">
                <div class="card">
                    <div class="card-body text-center">
                        <span class="badge {{ $attraction->status == 'active' ? 'bg-success' : 'bg-danger' }} fs-6">
                            {{ ucfirst($attraction->status) }}
                        </span>
                        @if ($attraction->is_featured)
                            <span class="badge bg-warning text-dark fs-6 ms-2">Featured</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th width="150">Name</th>
                    <td>{{ $attraction->name }}</td>
                </tr>
                <tr>
                    <th>Zone</th>
                    <td>{{ $attraction->zone->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $attraction->price ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Opening Hours</th>
                    <td>{{ $attraction->opening_hours ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $attraction->location ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $attraction->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $attraction->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Last Updated</th>
                    <td>{{ $attraction->updated_at->format('d M Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
