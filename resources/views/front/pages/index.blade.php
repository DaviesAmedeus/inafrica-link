@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document title')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection

@section('breadcrumb-section')
    <x-front.breadcrumb :home="request()->is('/')" />
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
                    <p class="mb-4">
                        In-Africa Link is a travel support company operating in Tanzania mainland and
                        Zanzibar, with over two years of experience and more than 500 guests served. The company specializes
                        in affordable, safe, and comfortable accommodations, offering homestays, apartments, and hotels,
                        along with curated travel experiences such as safaris, trekking, beach holidays, and car rentals.
                        Committed to sustainability and community impact, In-Africa Link dedicates 5% of its profits to
                        environmental initiatives supporting schools in Tanzania.
                    </p>

                    <a href="" class="btn btn-primary mb-3">Plan Your Trip +</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    {{-- Categories Carousel  START --}}
    <section class="container py-5">

           <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">TOUR CATEGORIES</h5>
                <h1 class="mb-0">Choose From Our Categories</h1>
            </div>

        <div class="swiper packageSwiper">

            <div class="swiper-wrapper">

                @forelse (tourCategories() as $category)
                <div class="swiper-slide">
                    <div class="card h-100">
                        <img src="{{ asset('storage/images/breadcrumb/' . $category->breadcrumb_img) }}"
                                class="img-fluid w-100 rounded-top" alt="Image">
                        <div class="card-body">
                             <h5 class="mb-0">{{ $category->name }}</h5>
                                <small class="">{{ words($category->category_desc, 10) }}</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <a href="{{ route('category_tours', ['slug' => $category->slug]) }}"
                                    class="btn btn-primary mb-3">View {{ $category->name }}</a>
                        </div>
                    </div>
                </div>

                @empty
                <div>
                        No Categories yet
                    </div>

                     <div class="swiper-pagination mt-3"></div>

                @endforelse
                </div>
            </div>
        </div>

    </section>
   {{-- Categories Carousel  END --}}


   <x-front.plan-trip />
   <x-front.team />
   <x-front.gallery />
   <x-front.tiles />

@endsection

@push('scripts')
    <script>
        new Swiper(".packageSwiper", {

            slidesPerView: 3,
            spaceBetween: 20,

            loop: true,

            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            breakpoints: {

                0: {
                    slidesPerView: 1
                },

                768: {
                    slidesPerView: 2
                },

                992: {
                    slidesPerView: 3
                }
            }
        });
    </script>
@endpush
