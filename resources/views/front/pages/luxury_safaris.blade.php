@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document title')
@section('breadcrumb-section')
    <!-- Breadcrumb Start -->
    <x-front.breadcrumb img_link="luxury-safaris-bread.webp">Luxury Safaris</x-front.breadcrumb>
    <!-- Breadcrumb End -->
@endsection
@section('content')
    <!-- Luxury-safaris Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">IN-AFRICA LINK Luxury Safaris</h5>
                <h1 class="mb-4">Our Popular Luxury Safaris</h1>
                <p class="mb-0">Indulge in the finest safari experience with premium lodges, personalized service, and
                    exclusive game drives—where comfort meets the wild in unforgettable style.
                </p>
            </div>
            <div class="row g-4 justify-content-center">

                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="{{ asset('front/assets/img/blog-1.jpg') }}"
                                    alt="Image">
                                <div class="blog-icon">
                                    <a href="{{ route('single_tour') }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="blog-content border border-top-0  p-4">
                            <a href="#" class="h4">3 Day Tanzania luxury Safari</a>
                        </div>
                    </div>
                    <div class="row bg-text-button rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="{{ route('single_tour') }}" class="btn-hover  btn text-white py-2 px-4">Read More...</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4">Book Now!</a>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="{{ asset('front/assets/img/blog-1.jpg') }}"
                                    alt="Image">
                                <div class="blog-icon">
                                    <a href="{{ route('single_tour') }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="blog-content border border-top-0  p-4">
                            <a href="#" class="h4">3 Day Tanzania luxury Safari</a>
                        </div>
                    </div>
                    <div class="row bg-text-button rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="{{ route('single_tour') }}" class="btn-hover  btn text-white py-2 px-4">Read More...</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4">Book Now!</a>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="{{ asset('front/assets/img/blog-1.jpg') }}"
                                    alt="Image">
                                <div class="blog-icon">
                                    <a href="{{ route('single_tour') }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="blog-content border border-top-0  p-4">
                            <a href="#" class="h4">3 Day Tanzania luxury Safari</a>
                        </div>
                    </div>
                    <div class="row bg-text-button rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="{{ route('single_tour') }}" class="btn-hover  btn text-white py-2 px-4">Read More...</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4">Book Now!</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Luxury-safaris End -->
@endsection
