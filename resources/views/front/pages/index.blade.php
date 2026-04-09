@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document title')
@section('breadcrumb-section')
    <!-- Carousel Start -->
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
                            <p class="mb-5 fs-5">Plan your journey with confidence through a reliable partner dedicated to
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
                            <p class="mb-5 fs-5">Experience Africa like never before—an unforgettable journey of wildlife,
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
    <!-- Carousel End -->
@endsection
@section('content')




    <!-- About Start -->
    <div class="container-fluid about pt-5">
        <div class="container pb-3">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="h-100" style="border: 50px solid; border-color: transparent #C17817 transparent #C17817;">
                        <img src="{{ asset('front/assets/img/InAfricaLink-coffee.png') }}" class="img-fluid w-100 h-100"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url({{ asset('front/assets/img/about-img-1.png') }});">
                    <h5 class="section-about-title pe-3">Discover Tanzania Tours with</h5>
                    <h1 class="mb-4"> In-Africa Link</h1>
                    <p class="mb-4">In-Africa Link is a travel support company operating in Tanzania mainland and
                        Zanzibar, with over two years of experience and more than 500 guests served. The company specializes
                        in affordable, safe, and comfortable accommodations, offering homestays, apartments, and hotels,
                        along with curated travel experiences such as safaris, trekking, beach holidays, and car rentals.
                        Committed to sustainability and community impact, In-Africa Link dedicates 5% of its profits to
                        environmental initiatives supporting schools in Tanzania.</p>

                    <a href="" class="btn btn-primary mb-3">Plan Your Trip +</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Packages Start -->
    <div class="container-fluid packages py-5" id="packages">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">TOUR Categories</h5>
                <h1 class="mb-0">Choose From Our Ctegories</h1>
            </div>
            <div class="packages-carousel owl-carousel">
                <!-- Package 1 Start -->
                <div class="packages-item">
                    <div class="packages-img">
                        <img src="{{ asset('front/assets/img/trekking.webp') }}" class="img-fluid w-100 rounded-top"
                            alt="Image">
                    </div>
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-0">Trekking</h5>
                            <small class="">Explore nature eye to eye- adventure begin on the trail</small>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <a href="" class="btn btn-primary mb-3">View All Treks</a>
                        </div>
                    </div>
                </div>
                <!-- Package 1 end -->

                <!-- Package 2 Start -->
                <div class="packages-item">
                    <div class="packages-img">
                        <img src="{{ asset('front/assets/img/local-tours.webp') }}" class="img-fluid w-100 rounded-top"
                            alt="Image">
                    </div>
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-0">Local Tours</h5>
                            <small class="">Discover culture, history and hidden gems close to home</small>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <a href="" class="btn btn-primary mb-3">View All Tours</a>
                        </div>
                    </div>
                </div>
                <!-- Package 2 end -->

                <!-- Package 3 Start -->
                <div class="packages-item">
                    <div class="packages-img">
                        <img src="{{ asset('front/assets/img/wild-safaris.webp') }}" class="img-fluid w-100 rounded-top"
                            alt="Image">
                    </div>
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-0">Wild Safaris</h5>
                            <small class="">Get close to the wild and witness nature in its raw beauty.</small>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <a href="" class="btn btn-primary mb-3">View All Safaris</a>
                        </div>
                    </div>
                </div>
                <!-- Package 3 end -->

                <!-- Package 4 Start -->
                <div class="packages-item">
                    <div class="packages-img">
                        <img src="{{ asset('front/assets/img/beach-holiday.webp') }}" class="img-fluid w-100 rounded-top"
                            alt="Image">
                    </div>
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-0">Beach Holidays</h5>
                            <small class="">Relax, unwind and soak in the sun by the ocean</small>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <a href="" class="btn btn-primary mb-3">See All Vacations</a>
                        </div>
                    </div>
                </div>
                <!-- Package 4 end -->
            </div>
        </div>
    </div>
    <!-- Packages End -->


    <!-- Tour Booking Start -->
    <div class="container-fluid booking py-5" id="trip-planner">
        <div class="container py-5">
            <div class="row g-5 align-items-center">

                <div class="col-lg-12">
                    <h1 class="text-white mb-3">Plan Your Trip</h1>
                    <p class="text-white mb-4">Specify how you want your trip to be by filling this form and send it!</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="date" class="form-control bg-white border-0" id="datetime"
                                        placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="datetime">Travel Date Expected</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">Days Expected To Stay</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Serengeti National Park</option>
                                        <option value="2">Tarangire National Park</option>
                                        <option value="3">Lake Manyara National Park</option>
                                        <option value="3">Ruaha National Park</option>
                                        <option value="3">Katavi National Park</option>
                                        <option value="3">Mikumi National Park</option>
                                        <option value="3">Udzungwa Mountains National Park</option>
                                        <option value="3">Saadani National Park</option>
                                        <option value="3">Gombe National Park</option>
                                        <option value="3">Kitulo National Park</option>
                                        <option value="3">Climbing Mt. Kilimanjaro</option>
                                    </select>
                                    <label for="select1">Destination</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Budget</option>
                                        <option value="1">Mid-range</option>
                                        <option value="2">Luxury</option>
                                    </select>
                                    <label for="select1">Bugdet Level</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">No of Adults</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" min="1" max="100"
                                        class="form-control bg-white border-0" id="datetime" placeholder="numeric"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="SelectPerson">No of Kids</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">-- Select --</option>
                                        <option value="1">Camping</option>
                                        <option value="1">Lodges</option>
                                        <option value="2">5* Hotels</option>
                                        <option value="2">4* Hotels</option>
                                        <option value="2">AirBnB</option>
                                        <option value="2">Farm House</option>


                                    </select>
                                    <label for="select1">Accomodation</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Send Via
                                    WhatsApp</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Send Via
                                    Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Booking End -->

    <!-- Travel Guide Start -->
    <div class="container-fluid guide py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">In-Africa Team</h5>
                <h1 class="mb-0">Meet Our Experienced Experts</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="{{ asset('front/assets/img/guide-1.jpg') }}" class="img-fluid w-100 rounded-top"
                                    alt="Image">
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="{{ asset('front/assets/img/guide-2.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="Image">
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="{{ asset('front/assets/img/guide-3.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="Image">
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="{{ asset('front/assets/img/guide-4.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="Image">
                            </div>
                            <div class="guide-icon rounded-pill p-2">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Full Name</h4>
                                <p class="mb-0">Designation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Travel Guide End -->


    <!-- Gallery Start -->
    <div class="container-fluid gallery mb-3" id="gallery">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            {{-- <h5 class="section-title px-3">Be Inspired From Our Experiences</h5> --}}
            <h1 class="mb-4">Be Inspired From Our Experiences</h1>
        </div>
        <div class="tab-class text-center">

            <div class="tab-content">
                <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-2">


                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery1.jpg') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery1.jpg') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery2.jpeg') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery2.jpeg') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery3.png') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery3.png') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery4.jpeg') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery4.jpeg') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery5.png') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery5.png') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('front/assets/img/gallery/gallery6.png') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i
                                                class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ asset('front/assets/img/gallery/gallery6.png') }}" data-lightbox="gallery-1"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Services Start -->
    <div class="container-fluid bg-light service py-0">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                {{-- <h5 class="section-title px-3">Why Choose</h5> --}}
                <h1 class="mb-0">In-Africa Link</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                <div class="service-content text-end">
                                    <h5 class="mb-4">Licensed & Insured</h5>
                                    <p class="mb-0">Fully licensed tour operator with comprehensive travel insurance
                                        coverage
                                    </p>
                                </div>
                                <div class="service-icon p-4">
                                    <i class="fa fa-shield-alt fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                <div class="service-content text-end">
                                    <h5 class="mb-4">Expert Local Guides</h5>
                                    <p class="mb-0">Certified wildlife guides with 10+ years of experience and deep local
                                        knowledge
                                    </p>
                                </div>
                                <div class="service-icon p-4">
                                    <i class="fa fa-map-marked-alt fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                <div class="service-content text-end">
                                    <h5 class="mb-4">Conservation Partners</h5>
                                    <p class="mb-0">Official partners with WWF, WCS, and local conservation organizations
                                    </p>
                                </div>
                                <div class="service-icon p-4">
                                    <i class="fa fa-leaf fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4">
                         <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                <div class="service-icon p-4">
                                    <i class="fa fa-award fa-4x"></i>
                                </div>
                                <div class="service-content">
                                    <h5 class="mb-4">Award Winning</h5>
                                    <p class="mb-0">Recognized by Travel + Leisure and National Geographic for excellence
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                <div class="service-icon p-4">
                                   <i class="fa fa-handshake fa-4x"></i>
                                </div>
                                <div class="service-content">
                                    <h5 class="mb-4">Community Focused​</h5>
                                    <p class="mb-0">Supporting local communities through fair wages and development
                                        projects</p>
                                </div>
                            </div>
                        </div>


                         <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                <div class="service-icon p-4">
                                   <i class="fa fa-recycle fa-4x"></i>
                                </div>
                                <div class="service-content">
                                    <h5 class="mb-4">Eco-Friendly​</h5>
                                    <p class="mb-0">Carbon-neutral operations with sustainable tourism practices</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection
