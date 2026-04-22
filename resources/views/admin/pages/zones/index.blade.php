@extends('admin.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Zones</h1>
        <a href="{{ route('admin.zones.create') }}" class="btn btn-primary">Create Zone</a>
    </div>

    @if(session('success'))
                    <div id="successAlert" class="alert alert-success border-0 rounded-4 shadow-sm d-flex align-items-center justify-content-between px-4 py-3 mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <span class="fw-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
    <hr>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price Range</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($zones as $zone)
                <tr>
                    <td>{{ $zone->id }}</td>
                    <td>{{ $zone->name }}</td>
                    <td>{{ $zone->price_range }}</td>
                    <td>
                        @if ($zone->image)
                            <img src="{{ asset('storage/' . $zone->image) }}" alt="{{ $zone->name }}" width="100">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.zones.show', $zone) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.zones.edit', $zone) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.zones.destroy', $zone) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No zones found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
