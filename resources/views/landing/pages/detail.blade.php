@extends('landing.master')

@section('content')
<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
            <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
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

                <div class="property_single_details_slide mb-4">
                    <img src="{{ Storage::url($zone->image) }}"
                         class="img-fluid rounded shadow-sm w-100"
                         alt="{{ $zone->name }}">
                </div>

                <div class="property_single_details_price mb-5">
                    <h1>{{ $zone->name }}</h1>
                    <h4 class="text-primary mb-3">Rp. {{ number_format($zone->price_range, 0, ',', '.') }}</h4>
                    <p>{{ $zone->description }}</p>
                </div>

                <!-- ATTRACTIONS -->
                <div class="property_single_details_description">
                    <h4 class="mb-4">Attractions in this Zone</h4>

                    <div class="row">
                        @forelse($zone->attractions as $attraction)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm border-0 rounded">
                                    <img src="{{ Storage::url($attraction->image) }}"
                                         class="card-img-top"
                                         alt="{{ $attraction->name }}"
                                         style="height:220px; object-fit:cover;">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $attraction->name }}</h5>

                                        <p class="text-muted small mb-2">
                                            {{ $attraction->price ? 'Price: Rp. '.number_format($attraction->price, 0, ',', '.') : 'Free' }}
                                        </p>

                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit($attraction->description, 120) }}
                                        </p>
                                    </div>

                                    <div class="card-footer bg-white border-0">
                                        <button type="button"
                                                class="btn btn-primary btn-sm"
                                                data-toggle="modal"
                                                data-target="#reviewModal{{ $attraction->id }}">
                                            Give Review
                                        </button>
                                    </div>
                                </div>

                                <!-- REVIEW MODAL -->
                                <div class="modal fade"
                                     id="reviewModal{{ $attraction->id }}"
                                     tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="reviewModalLabel{{ $attraction->id }}"
                                     aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reviewModalLabel{{ $attraction->id }}">
                                                    Leave a Review for {{ $attraction->name }}
                                                </h5>

                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('reviews.store') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">

                                                @auth
                                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                @endauth

                                                <div class="modal-body">

                                                    @guest
                                                        <div class="form-group mb-3">
                                                            <label>Your Name</label>
                                                            <input type="text"
                                                                   name="visitor_name"
                                                                   class="form-control"
                                                                   required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Your Email</label>
                                                            <input type="email"
                                                                   name="visitor_email"
                                                                   class="form-control"
                                                                   required>
                                                        </div>
                                                    @endguest

                                                    <div class="form-group mb-3">
                                                        <label>Rating</label>
                                                        <select name="rating" class="form-control" required>
                                                            <option value="">Select Rating</option>
                                                            <option value="5">★★★★★ - 5 Stars</option>
                                                            <option value="4">★★★★☆ - 4 Stars</option>
                                                            <option value="3">★★★☆☆ - 3 Stars</option>
                                                            <option value="2">★★☆☆☆ - 2 Stars</option>
                                                            <option value="1">★☆☆☆☆ - 1 Star</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Comment</label>
                                                        <textarea name="comment"
                                                                  class="form-control"
                                                                  rows="4"
                                                                  placeholder="Share your experience..."
                                                                  required></textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <button type="submit"
                                                            class="btn btn-primary">
                                                        Submit Review
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-light border text-center">
                                    No attractions available in this zone.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- REVIEWS -->
                <div class="property_info mt-5">
                    <div class="single_property_list">
                        <h4 class="mb-4">Recent Reviews</h4>

                        @php
                            $reviews = collect();
                            foreach ($zone->attractions as $attraction) {
                                $reviews = $reviews->merge($attraction->reviews->where('is_approved', true));
                            }
                            $reviews = $reviews->sortByDesc('created_at');
                        @endphp

                        @forelse($reviews as $review)
                            <div class="media mb-4 p-3 shadow-sm rounded bg-light">
                                <div class="media-body">

                                    <h6 class="font-weight-bold mb-1">
                                        {{ optional($review->user)->name ?? $review->visitor_name ?? 'Anonymous Visitor' }}

                                        <span class="text-warning ml-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star-o"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </h6>

                                    <p class="small text-muted mb-2">
                                        Reviewed on {{ optional($review->attraction)->name ?? 'Unknown Attraction' }}
                                    </p>

                                    <p class="mb-2">{{ $review->comment }}</p>

                                    <small class="text-muted">
                                        {{ $review->created_at ? $review->created_at->diffForHumans() : '' }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-light border">
                                No reviews yet for this zone.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-3 col-sm-12">
                <div class="single_property_form shadow-sm p-3 rounded bg-white">
                    <h4 class="mb-3">Enquire Here</h4>

                    <form class="form" method="POST" action="#">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Name"
                                   required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Email"
                                   required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Phone"
                                   required>
                        </div>

                        <div class="form-group mb-3">
                            <textarea rows="5"
                                      name="message"
                                      class="form-control"
                                      placeholder="Your Message"
                                      required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection