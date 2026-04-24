@extends('landing.master')

@section('content')
    <!-- START HOME -->
    <section id="home" class="home_bg"
        style="background-image: url({{ asset('storage/landing/assets/img/bg/home-bg.jpg') }});  background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12 text-center">
                    <div class="hero-text">
                        <h2>Experience the Magic</h2>
                        <p>Discover the best theme park zones and thrilling attractions. Create unforgettable memories with your family and friends.</p>
                        <div class="home_btn">
                            <a href="#zones" class="app-btn wow bounceIn page-scroll home_btn_color_one"
                                data-wow-delay=".6s">Explore Zones</a>
                            <a href="#featured" class="app-btn wow bounceIn page-scroll home_btn_color_two"
                                data-wow-delay=".8s">Featured Attractions</a>
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->

    <!-- START ZONES -->
    <section id="zones" class="template_property section-padding">
        <div class="container">
            <div class="section-title text-center wow zoomIn">
                <h2>Our Park Zones</h2>
                <p>Explore different worlds within our park</p>
                <div></div>
            </div>
            <div class="row">
                @forelse($zones as $zone)
                    <div class="col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <div class="single_property h-100">
                            <img src="{{ Storage::url($zone->image) }}" class="img-fluid" alt="{{ $zone->name }}" style="height: 250px; width: 100%; object-fit: cover;" />
                            <div class="single_property_description text-center">
                                <span><i class="fa fa-map-marker"></i> {{ $zone->name }}</span>
                            </div>
                            <div class="single_property_content">
                                <h4><a href="{{ route('zone.detail', $zone) }}">{{ $zone->name }}</a></h4>
                                <p>{{ Str::limit($zone->description, 100) }}</p>
                            </div>
                            <div class="single_property_price">
                                From <span>Rp. {{ $zone->price_range }}</span>
                                <div class="float-right">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                            </div>
                        </div><!--- END SINGLE PROPERTY -->
                    </div><!--- END COL -->
                @empty
                    <div class="col-12 text-center">
                        <p>No zones available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- END ZONES -->

    <!-- START FEATURED ATTRACTIONS -->
    <section id="featured" class="template_property section-padding bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h2>Featured Attractions</h2>
                <p>Don't miss these top-rated experiences</p>
                <div></div>
            </div>
            <div class="row">
                @forelse($attractions as $attraction)
                    <div class="col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <div class="single_property h-100">
                            <img src="{{ Storage::url($attraction->image) }}" class="img-fluid" alt="{{ $attraction->name }}" style="height: 250px; width: 100%; object-fit: cover;" />
                            <div class="single_property_description text-center">
                                <span><i class="fa fa-bolt"></i> {{ $attraction->zone->name }}</span>
                            </div>
                            <div class="single_property_content">
                                <h4><a href="{{ route('attraction.detail', $attraction) }}">{{ $attraction->name }}</a></h4>
                                <p>{{ Str::limit($attraction->description, 100) }}</p>
                            </div>
                            <div class="single_property_price">
                                Ticket: <span>{{ $attraction->price ?: 'Free' }}</span>
                                <div class="float-right text-warning">
                                    <i class="fa fa-clock-o"></i> {{ $attraction->opening_hours }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Check back soon for featured attractions!</p>
                    </div>
                @endforelse
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END FEATURED ATTRACTIONS -->

    <!-- START TEAM US -->
    <section id="team" class="our_team section-padding">
        <div class="container">
            <div class="section-title text-center wow zoomIn">
                <h2>Our Management Team</h2>
                <p>Dedicated to providing the best experience</p>
                <div></div>
            </div>
            <div class="row text-center">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="single_team">
                        <img src="{{ asset('storage/landing/assets/img/team/13.png') }}" class="img-fluid" alt="" />
                        <h3>Juthi Ahmed</h3>
                        <p>Manager</p>
                    </div><!--- END SINGLE TEAM -->
                </div><!--- END COL -->
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="single_team">
                        <img src="{{ asset('storage/landing/assets/img/team/12.jpg') }}" class="img-fluid" alt="" />
                        <h3>Masum Billah</h3>
                        <p>Operations</p>
                    </div><!--- END SINGLE TEAM -->
                </div><!--- END COL -->
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="single_team">
                        <img src="{{ asset('storage/landing/assets/img/team/11.jpg') }}" class="img-fluid" alt="" />
                        <h3>Syed Ekram</h3>
                        <p>Safety Officer</p>
                    </div><!--- END SINGLE TEAM -->
                </div><!--- END COL -->
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="single_team">
                        <img src="{{ asset('storage/landing/assets/img/team/team-6.png') }}" class="img-fluid" alt="" />
                        <h3>Hanjala Haque</h3>
                        <p>Guest Services</p>
                    </div><!--- END SINGLE TEAM -->
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END TEAM US -->

    <!-- START TESTIMONIAL -->
    <section class="our_testimonial section-padding"
        style="background-image: url({{ asset('storage/landing/assets/img/bg/testimonial-bg.jpg') }});  background-size:cover;background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12 col-xs-12 text-center">
                    <div class="testimonial1-carousel">
                        <div class="single-testimonial text-white">
                            <img src="{{ asset('storage/landing/assets/img/testimonial/1.jpg') }}" alt="">
                            <h4 class="text-white">Mark Richard</h4>
                            <p>"Amazing experience! The kids loved every moment, and the attractions were top-notch."</p>
                        </div>
                        <div class="single-testimonial text-white">
                            <img src="{{ asset('storage/landing/assets/img/testimonial/2.jpg') }}" alt="">
                            <h4 class="text-white">Sarah Jenkins</h4>
                            <p>"A perfect day out. Well organized and great value for money."</p>
                        </div>
                    </div>
                </div><!-- END COL -->
            </div><!--END  ROW  -->
        </div><!-- END CONTAINER  -->
    </section>
    <!-- END TESTIMONIAL -->
@endsection
