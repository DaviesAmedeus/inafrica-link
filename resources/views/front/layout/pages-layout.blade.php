<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('meta_tags')

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="/images/site/{{ isset(settings()->site_favicon) ? settings()->site_favicon : '' }}" />

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <header>
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        {{-- @auth
 <div class="container-fluid bg-primary px-2 d-none d-lg-block">
            <div class="row gx-0 justify-content-end">

                <div class="col-lg-4 align-self-center">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i>Admin</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item"><i class="fas fa-user-alt me-2"></i>Dashboard</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Settings</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endauth --}}

        <!-- Topbar End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"
                style="background-color: rgb(255, 255, 255); color: white">
                <a href="/" class="navbar-brand p-0">

                    <img src="/images/site/{{ isset(settings()->site_light_mode_logo) ? settings()->site_light_mode_logo : '' }}"
                        alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link  {{ Route::is('home') ? 'active' : '' }}">Home</a>
                        {!! navigations() !!}




                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>

                            <div class="dropdown-menu m-0">
                                <a href="#" class="dropdown-item">Blog</a>
                                <a href="#" class="dropdown-item">FAQ</a>
                                <a href="#" class="dropdown-item">Contact Us</a>

                            </div>

                        </div>
                        @auth
                            <div class="nav-item dropdown" style="background-color: green;">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin Panel</a>

                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="dropdown-item">Logout</a>
                                    <form action="{{ route('admin.logout') }}" id="logout-form" method="POST">@csrf</form>
                                </div>

                            </div>
                        @endauth

                    </div>
                    <a href="{{ Route::is('home') ? '#trip-planner' : '#' }}"
                        class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Plan Your Trip</a>
                </div>
            </nav>


            @yield('breadcrumb-section')

        </div>


        <!-- Navbar & Hero End -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            @if (settings()->site_title)
                                <h4 class="mb-4 text-white">{{ settings()->site_title }}</h4>
                            @else
                                <h4 class="mb-4 text-white">Get In Touch</h4>
                            @endif


                            <a href=""><i class="fas fa-home me-2"></i> Block B, Ubungo South. Plot No. 1428 Dar
                                es
                                salaam</a>
                            @if (settings()->site_email)
                                <a href="#!"><i class="fas fa-envelope me-2"></i>{{ settings()->site_email }}</a>
                            @endif
                            @if (settings()->site_phone)
                                <a href="#!"><i class="fas fa-phone me-2"></i>{{ settings()->site_phone }}</a>
                            @endif


                            <div class="d-flex align-items-center">
                                @if (site_social_links()->facebook_url)
                                    <i class="fas fa-share fa-2x text-white me-2"></i>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1"
                                        href="{{ site_social_links()->facebook_url }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if (site_social_links()->instagram_url)
                                    <a class="btn-square btn btn-primary rounded-circle mx-1"
                                        href="{{ site_social_links()->instagram_url }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if (site_social_links()->linkedin_url)
                                    <a class="btn-square btn btn-primary rounded-circle mx-1"
                                        href="{{ site_social_links()->linkedin_url }}" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Useful Links</h4>
                            <a href="#!"><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href="#!"><i class="fas fa-angle-right me-2"></i> FAQ</a>
                            <a href="#!"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                            <a href="#!"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href="#!"><i class="fas fa-angle-right me-2"></i> Terms and Conditions</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Tour Links</h4>

                            @forelse (tourCategories() as $category)
                                <a href="{{ route('category_tours', ['slug' => $category->slug]) }}"><i
                                        class="fas fa-angle-right me-2"></i> {{ $category->name }}</a>

                            @empty
                                <a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i>Home</a>
                            @endforelse


                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <div class="row gy-3 gx-2 mb-4">
                                {{-- From Trip Advisor --}}
                                <div id="TA_excellent805" class="TA_excellent">
                                    <ul id="qLAwcyi" class="TA_links iIsBzzY">
                                        <li id="qVfnXXUYZsI" class="3bXaFKkB"><a target="_blank"
                                                href="https://www.tripadvisor.com/Attraction_Review-g297913-d23589158-Reviews-In_Africa_Link-Arusha_Arusha_Region.html"><img
                                                    src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg"
                                                    alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO" /></a>
                                        </li>
                                    </ul>
                                </div>
                                <script async
                                    src="https://www.jscache.com/wejs?wtype=excellent&amp;uniq=805&amp;locationId=23589158&amp;lang=en_US&amp;display_version=2"
                                    data-loadtrk onload="this.loadtrk=true"></script>
                            </div>
                            {{-- <h4 class="text-white mb-3">Payments</h4>
                        <div class="footer-bank-card">
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-amex fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-visa fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fas fa-credit-card fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-paypal fa-2x"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-cc-discover fa-2x"></i></a>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->



    </footer>

    <!-- Copyright Start -->
    <div class="container-fluid copyright text-body py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">In-Africa Link</a>
                    - All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-start">

                    Designed By <a class="text-white" href="https://daviesamedeus.github.io/portfolio/">Davies
                        Amedeus</a> From <a href="#!">KODA TECHNOLOGIES</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/lightbox/js/lightbox.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
</body>

</html>
