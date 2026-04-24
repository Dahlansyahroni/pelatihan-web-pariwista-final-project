@extends('landing.master')

@section('content')
<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
            <div class="section-top-title wow fadeInRight">
                <h1>{{ $zone->name }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TOP -->

<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">

            <!-- MAIN CONTENT -->
            <div class="col-md-9 col-sm-12">

                <!-- IMAGE -->
                <div class="property_single_details_slide mb-4">
                    <img src="{{ Storage::url($zone->image) }}"
                         class="img-fluid rounded shadow-sm w-100"
                         alt="{{ $zone->name }}"
                         style="max-height: 500px; object-fit: cover;">
                </div>

                <!-- DETAIL -->
                <div class="property_single_details_price mb-5">
                    <h1>{{ $zone->name }}</h1>
                    <h4 class="text-primary mb-3">
                        Price Range: Rp {{ number_format($zone->price_range,0,',','.') }}
                    </h4>

                    <p style="font-size:1.1em; line-height:1.8; color:#555;">
                        {{ $zone->description }}
                    </p>
                </div>

                <!-- REVIEWS LIST -->
                <div class="property_info mt-5">
                    <h4 class="mb-4">Reviews</h4>

                    @forelse($zone->reviews->where('is_approved',1)->sortByDesc('created_at') as $review)
                        <div class="media mb-4 p-3 shadow-sm rounded bg-light">
                            <div class="media-body">

                                <h6 class="font-weight-bold mb-1">
                                    {{ $review->user ? $review->user->name : ($review->visitor_name ?: 'Anonymous') }}

                                    <span class="text-warning ml-2">
                                        @for($i=1;$i<=5;$i++)
                                            <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                        @endfor
                                    </span>
                                </h6>

                                <p class="mb-2">{{ $review->comment }}</p>

                                <small class="text-muted">
                                    {{ $review->created_at->diffForHumans() }}
                                </small>

                            </div>
                        </div>
                    @empty
                        <div class="alert alert-light border">
                            No reviews yet. Be the first to review!
                        </div>
                    @endforelse
                </div>

                <!-- REVIEW FORM -->
                <div class="contact_form mt-5">
                    <h4 class="mb-4">Leave a Review</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('reviews.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
                        @csrf

                        <!-- 🔥 PENTING: zone_id -->
                        <input type="hidden" name="zone_id" value="{{ $zone->id }}">

                        @auth
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <p>Posting as: <strong>{{ auth()->user()->name }}</strong></p>
                        @else
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="visitor_name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="visitor_email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                        @endauth

                        <div class="mb-3">
                            <select name="rating" class="form-control" required>
                                <option value="">Select Rating</option>
                                <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                                <option value="4">⭐⭐⭐⭐ - Very Good</option>
                                <option value="3">⭐⭐⭐ - Good</option>
                                <option value="2">⭐⭐ - Fair</option>
                                <option value="1">⭐ - Poor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <textarea name="comment" class="form-control" rows="4" required placeholder="Share your experience..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit Review
                        </button>
                    </form>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-3 col-sm-12">
                <div class="single_property_form shadow-sm p-3 rounded bg-white">
                    <h4 class="mb-3">Zone Info</h4>

                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Name:</strong> {{ $zone->name }}</li>
                        <li class="mb-2"><strong>Price Range:</strong> Rp {{ number_format($zone->price_range,0,',','.') }}</li>
                        <li class="mb-2"><strong>Total Attractions:</strong> {{ $zone->attractions->count() }}</li>
                    </ul>

                    <hr>

                    <a href="{{ url('/#featured') }}" class="btn btn-primary btn-block">
                        Back to Zones
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection