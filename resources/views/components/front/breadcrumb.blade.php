@props(['home' => false, 'img_link'])


@if ($home)
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('front/assets/img/slide1.jpeg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">

                            <h1 class="display-2 text-capitalize text-white mb-4">Your Gateway to Authentic Africa</h1>
                            <p class="mb-5 fs-5">Discover Tanzania's extraordinary wildlife, vibrant cultures, and
                                breathtaking landscapes through transformative safari experiences that create lasting
                                memories while supporting conservation and local communities.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                    href="#packages">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front/assets/img/slide2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">

                            <h1 class="display-2 text-capitalize text-white mb-4">Your Trusted Safari Partner
                            </h1>
                            <p class="mb-5 fs-5">Plan your journey with confidence through a reliable partner dedicated
                                to
                                delivering seamless safari experiences, personalized service, and unforgettable moments
                                across Tanzania.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                    href="#trip-planner">Plan Your Journey +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front/assets/img/slide3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">

                            <h1 class="display-2 text-capitalize text-white mb-4">A Lifetime African Experience</h1>
                            <p class="mb-5 fs-5">Experience Africa like never before—an unforgettable journey of
                                wildlife,
                                culture, and breathtaking beauty that stays with you for a lifetime.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                    href="#gallery">See Experiences</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon custom-control"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon custom-control"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@else
    <div>
        <div class="container-fluid bg-breadcrumb"
            style="background: linear-gradient(rgba(193, 119, 23, 0.215),rgb(32, 20, 5)), url({{ asset($img_link) }}); ">
            <div class="container text-center py-5" style="max-width: 900px; ">
                <h4 class="text-white display-3 mb-4">{{ $slot }}</h1>
            </div>
        </div>
    </div>
@endif
