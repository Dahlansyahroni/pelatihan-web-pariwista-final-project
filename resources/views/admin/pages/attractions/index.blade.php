@extends('admin.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Attractions</h1>
        <a href="{{ route('admin.attractions.create') }}" class="btn btn-primary">Create Attraction</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Zone</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attractions as $attraction)
                <tr>
                    <td>{{ $attraction->id }}</td>
                    <td>{{ $attraction->zone->name }}</td>
                    <td>{{ $attraction->name }}</td>
                    <td>{{ $attraction->price }}</td>
                    <td>
                        @if ($attraction->image)
                            <img src="{{ asset('storage/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="100">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.attractions.show', $attraction) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.attractions.destroy', $attraction) }}" method="POST"
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
                    <td colspan="6" class="text-center">No attractions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
