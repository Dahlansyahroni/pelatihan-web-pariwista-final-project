<!-- START NAVBAR -->
	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close mt-3">
				<span class="icon-close2 js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 col-xl-2">
					<h1 class="mb-0 site-logo"><a href="{{ url('/') }}"><img src="{{ asset('storage/landing/assets/img/logo.png') }}" alt=""></a></h1>
				</div>
				<div class="col-12 col-md-10 d-none d-xl-block">
					<nav class="site-navigation position-relative text-right" role="navigation">
						<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
							<li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
							<li><a class="nav-link" href="#zones">Zones</a></li>
							<li><a class="nav-link" href="#featured">Attractions</a></li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                @endif
                            @endauth
						</ul>
					</nav>
				</div>
				<div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
					<a href="#" class="site-menu-toggle js-menu-toggle float-right"><span
							class="icon-menu h3"></span></a>
				</div>
			</div>
		</div>
	</header>
	<!-- END NAVBAR-->
