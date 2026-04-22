@extends('admin.master')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Reviews</h1>
</div>

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<hr>

<table class="table table-striped mt-3 align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Attraction</th>
            <th>Reviewer</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Created</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>

                <td>
                    {{ optional($review->attraction)->name ?? '-' }}
                </td>

                <td>
                    @if ($review->user)
                        <div>{{ optional($review->user)->name }}</div>
                        <small class="text-muted">
                            {{ optional($review->user)->email }}
                        </small>
                    @else
                        <div>{{ $review->visitor_name ?? 'Anonymous Visitor' }}</div>
                        <small class="text-muted">
                            {{ $review->visitor_email ?? 'No Email' }} (Visitor)
                        </small>
                    @endif
                </td>

                <td>
                    <span class="badge bg-warning text-dark">
                        {{ $review->rating }} / 5
                    </span>
                </td>

                <td>
                    {{ \Illuminate\Support\Str::limit($review->comment, 100) }}
                </td>

                <td>
                    @if ($review->is_approved)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-secondary">Pending</span>
                    @endif
                </td>

                <td>
                    <small class="text-muted">
                        {{ $review->created_at ? $review->created_at->format('d M Y H:i') : '-' }}
                    </small>
                </td>

                <td>
                    @if (!$review->is_approved)
                        <form action="{{ route('admin.reviews.approve', $review->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-sm btn-success">
                                Approve
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this review?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    No reviews found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection