@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document title')
@section('breadcrumb-section')
    <!-- Breadcrumb Start -->
    <x-front.breadcrumb img_link="storage/images/tours/{{$tour->breadcrumb_img_tour}}">
   {{ $tour->title }}
    </x-front.breadcrumb>
    <!-- Breadcrumb End -->
@endsection
@section('content')
   <div class="container py-5">
    <div class="row g-5">

        <!-- LEFT -->
        <div class="col-lg-8">

            <!-- Tour Description -->
            <h2 class="mb-3">{{ $tour->title }}</h2>
            <p class="mb-4">
              {{ $tour->description }}
            </p>

            <!-- INFO -->
            <div class="row g-4 tour-info text-center mb-5">

                <div class="col-md-4">
                    <div class="info-box">
                        <i class="fa fa-hotel"></i>
                        <h6>Accommodation</h6>
                        <p>5-Star Suite</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <i class="fa fa-utensils"></i>
                        <h6>Meals</h6>
                        <p>Breakfast & Dinner</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <i class="fa fa-language"></i>
                        <h6>Language</h6>
                        <p>English / Swahili</p>
                    </div>
                </div>

            </div>

            <!-- TABS -->
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#overview">Overview</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#itinerary">Itinerary</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#includes">Includes/Excludes</button>
                </li>
            </ul>

            <div class="tour-tabs">
                <!-- TABS content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="overview">
                        <p>{!! $tour->overview !!}</p>
                    </div>

                    <div class="tab-pane fade" id="itinerary">
                        @foreach ( $tour->itinerary as $index => $item)
<h4>{{ $item['title'] ?? '' }}</h4>
                        <p>{{ $item['content'] ?? '' }}</p> 
                        @endforeach





                    </div>

                    <div class="tab-pane fade" id="includes">
                        <h5>Includes</h5>
                        <ul>
                            <li>Accommodation</li>
                            <li>Meals</li>
                            <li>Transport</li>
                        </ul>

                        <h5>Excludes</h5>
                        <ul>
                            <li>Accommodation</li>
                            <li>Meals</li>
                            <li>Transport</li>
                        </ul>



                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-4">

            <div class="card shadow-sm booking-card p-4">
                <h4 class="mb-4">Book This Tour</h4>

                <div class="price-box">
                    <p>1 Adult</p>
                    <h5>$350</h5>
                    <a href="booking.html" class="btn btn-primary w-100">Book Now</a>
                </div>

                <div class="price-box">
                    <p>2-4 Adults</p>
                    <h5>$500</h5>
                    <a href="booking.html" class="btn btn-primary w-100">Book Now</a>
                </div>

                <div class="price-box">
                    <p>5-50 Adults</p>
                    <h5>$1000</h5>
                    <a href="booking.html" class="btn btn-primary w-100">Book Now</a>
                </div>

            </div>

        </div>

    </div>
</div>

  <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h1 class="mb-0">Do You Have Any Questions Concerining This Tour?</h1>
                </div>
                <div class="row g-5 align-items-center">

                    <div class="col-lg-12">
                        <h3 class="mb-2">Send us a message</h3>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email" placeholder="Your Email">
                                        <label for="number">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection
