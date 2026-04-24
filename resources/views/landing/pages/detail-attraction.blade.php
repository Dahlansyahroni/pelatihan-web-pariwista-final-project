@extends('landing.master')

@section('content')
<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
            <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <h1>{{ $attraction->name }}</h1>
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

                <div class="property_single_details_slide mb-4">
                    <img src="{{ Storage::url($attraction->image) }}"
                         class="img-fluid rounded shadow-sm w-100"
                         alt="{{ $attraction->name }}"
                         style="max-height: 500px; object-fit: cover;">
                </div>

                <div class="property_single_details_price mb-5">
                    <h1>{{ $attraction->name }}</h1>
                    <h4 class="text-primary mb-3">Ticket Price: {{ $attraction->price ?: 'Free' }}</h4>
                    <div class="description-content">
                        <p style="font-size: 1.1em; line-height: 1.8; color: #555;">{{ $attraction->description }}</p>
                    </div>
                </div>

                <!-- REVIEWS LIST -->
                <div class="property_info mt-5">
                    <div class="single_property_list">
                        <h4 class="mb-4">Reviews</h4>
                        @forelse($attraction->reviews as $review)
                            <div class="media mb-4 p-3 shadow-sm rounded bg-light">
                                <div class="media-body">
                                    <h6 class="font-weight-bold mb-1">
                                        {{ $review->user ? $review->user->name : ($review->visitor_name ?: 'Anonymous') }}
                                        <span class="text-warning ml-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </span>
                                    </h6>
                                    <p class="mb-2">{{ $review->comment }}</p>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-light border">
                                No reviews yet. Be the first to review!
                            </div>
                        @endforelse
                    </div>
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
                        <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">
                        
                        @auth
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="mb-3">
                                <p>Posting as: <strong>{{ auth()->user()->name }}</strong></p>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="visitor_name" class="form-control" required placeholder="Your Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="visitor_email" class="form-control" required placeholder="Your Email">
                                </div>
                            </div>
                        @endauth

                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-control" required>
                                <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                                <option value="4">⭐⭐⭐⭐ - Very Good</option>
                                <option value="3">⭐⭐⭐ - Good</option>
                                <option value="2">⭐⭐ - Fair</option>
                                <option value="1">⭐ - Poor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comment</label>
                            <textarea name="comment" class="form-control" rows="4" required placeholder="Share your experience..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-3 col-sm-12">
                <div class="single_property_form shadow-sm p-3 rounded bg-white">
                    <h4 class="mb-3">Attraction Info</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Name:</strong> {{ $attraction->name }}</li>
                        <li class="mb-2"><strong>Zone:</strong> {{ $attraction->zone->name }}</li>
                        <li class="mb-2"><strong>Opening Hours:</strong> {{ $attraction->opening_hours }}</li>
                        <li class="mb-2"><strong>Price:</strong> {{ $attraction->price ?: 'Free' }}</li>
                    </ul>
                    <hr>
                    <a href="{{ url('/#featured') }}" class="btn btn-primary btn-block">Back to Attractions</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
