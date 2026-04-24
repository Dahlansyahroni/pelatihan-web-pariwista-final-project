@extends('admin.master')

@section('content')
<h1 class="mb-4 h2">Dashboard Overview</h1>

<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
        <!-- card -->
        <div class="card h-100 shadow-sm border-0">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0">Total Zones</h4>
                    </div>
                    <div class="icon-shape icon-md bg-primary-subtle text-primary rounded-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold">{{ $zones_count }}</h1>
                    <a href="{{ route('admin.zones.index') }}" class="text-center" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">Go to zones</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
        <!-- card -->
        <div class="card h-100 shadow-sm border-0">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0">Total Attractions</h4>
                    </div>
                    <div class="icon-shape icon-md bg-success-subtle text-success rounded-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-building-castle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 19v-2a3 3 0 0 0 -6 0v2" /><path d="M3 11v8h2v-5l2 2v3h7v-3l2 -2v5h2v-8" /><path d="M8 11v-4a2 2 0 1 1 4 0v4" /><path d="M18 11v-5a4 4 0 1 0 -8 0v5" /><path d="M22 11h-20" /></svg>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold">{{ $attractions_count }}</h1>
                    <a href="{{ route('admin.attractions.index') }}" class="text-center" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">attractions</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
        <!-- card -->
        <div class="card h-100 shadow-sm border-0">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0">Total Reviews</h4>
                    </div>
                    <div class="icon-shape icon-md bg-warning-subtle text-warning rounded-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold">{{ $reviews_count }}</h1>
                    <a href="{{ route('admin.reviews.index') }}"  class="text-center" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">Manage reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h4 class="mb-0">Recent Action Tips</h4>
            </div>
            <div class="card-body">
                <p>You can manage the zones and attractions from the sidebar. Reviews submitted by visitors will appear in the Reviews section for moderation.</p>
            </div>
        </div>
    </div>
</div>

@endsection
