@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document title')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection

@section('breadcrumb-section')
    <!-- Breadcrumb Start -->
    <x-front.breadcrumb img_link="images/site/tour_img_1781765744.jpg">
        <h1 class="display-4 fw-bold text-light">About InAfrica</h1>
        <p class="lead text-light">
            Creating unforgettable journeys and sharing the beauty, culture, and spirit of Africa.
        </p>
    </x-front.breadcrumb>
    <!-- Breadcrumb End -->
@endsection


@section('content')



<!-- Our Story -->
<section class="py-5">
    <div class="container">

        <!-- Section Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Story</h2>
            <p class="text-muted">
                A journey rooted in Africa, inspired by its people, and driven by purpose.
            </p>
        </div>

        <!-- Introduction -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9">

                <p class="lead">
                    <strong>In Africa Link was born from a simple belief:
                    Africa is not just a place to visit—it is a place to feel.</strong>
                </p>

                <p>
                    We were born in Africa, raised by its stories, inspired by its people,
                    and humbled by its beauty. In Africa Link was created to share the Africa
                    we call home—not as tourists see it, but as we live it.
                </p>

                <p>
                    As a proudly <strong>100% Tanzanian-owned company</strong>, we realized
                    that many travelers come to Tanzania searching for wildlife, yet leave
                    without truly discovering the people, cultures, traditions, and hidden
                    treasures that make this land extraordinary.
                </p>

                <p>
                    We created In Africa Link to bridge that gap.
                </p>

            </div>
        </div>


        <!-- Mission -->
        <div class="row align-items-center mb-5">

            <div class="col-lg-6">
                <img src="{{ asset('images/site/tour_img_1781765744.jpg') }}"
                     class="img-fluid rounded shadow"
                     alt="Mission">
            </div>

            <div class="col-lg-6">

                <h3 class="fw-bold mb-4">
                    Beyond the Ordinary Safari
                </h3>

                <p>
                    Our mission is to take travelers beyond the ordinary safari experience
                    and connect them with the authentic heartbeat of Africa.
                </p>

                <p>
                    From breathtaking landscapes and vibrant cultures to meaningful local
                    encounters, every journey is thoughtfully crafted to create memories
                    that last long after the journey ends.
                </p>

            </div>

        </div>


        <!-- More Than a Tour Company -->
        <div class="bg-light rounded p-5 mb-5">

            <h3 class="fw-bold mb-4">
                More Than a Tour Company
            </h3>

            <p>
                What makes us different is not only where we take you, but how we do it.
                Our team is made up of both women and men who know Africa deeply and passionately.
            </p>

            <p>
                We believe that a balanced and diverse team brings richer perspectives,
                stronger connections, and more meaningful experiences for every traveler.
            </p>

            <p>
                We do not simply plan trips. We create moments of wonder, connection,
                and discovery—moments that transform visitors into storytellers and
                guests into lifelong friends of Africa.
            </p>

        </div>


        <!-- Travel With Purpose -->
        <div class="row align-items-center mb-5">

            <div class="col-lg-6 order-lg-2">
                <img src="{{ asset('images/site/tour_img_1781765744.jpg') }}"
                     class="img-fluid rounded shadow"
                     alt="Travel With Purpose">
            </div>

            <div class="col-lg-6 order-lg-1">

                <h3 class="fw-bold mb-4">
                    Travel With Purpose
                </h3>

                <p>
                    At In Africa Link, we believe tourism should leave a positive impact
                    on both people and the planet.
                </p>

                <p>
                    For every journey completed with us, we plant trees as part of our
                    commitment to preserving Africa's natural beauty for future generations.
                </p>

                <p>
                    We also support environmental education through school programs that
                    promote clean communities and inspire young people to become guardians
                    of nature.
                </p>

                <p>
                    Through our community support initiatives, we help provide educational
                    opportunities for bright students from disadvantaged families.
                </p>

            </div>

        </div>


        <!-- Closing -->
        <div class="text-center">

            <h3 class="fw-bold mb-4">
                Lifetime African Experience
            </h3>

            <div class="col-lg-9 mx-auto">

                <p>
                    Whether you are witnessing the Great Migration across the Serengeti,
                    standing on the summit of Mount Kilimanjaro, exploring the turquoise
                    shores of Zanzibar, or discovering hidden gems known only to locals,
                    our promise remains the same:
                </p>

                <h2 class="fw-bold text-warning my-4">
                    Lifetime African Experience
                </h2>

                <p class="lead">
                    Because the greatest journey is not measured by the places you visit,
                    but by the lives you touch, the memories you create, and the positive
                    impact you leave behind.
                </p>

            </div>

        </div>

    </div>
</section>

<!-- Founder Message -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">A Word From Our Founder</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">

                        <p class="fs-5 text-muted">
                            "Travel has the power to inspire, connect, and transform lives.
                            InAfrica was created from a deep love for Africa and a desire
                            to share its breathtaking landscapes, cultures, and experiences
                            with the world.
                        </p>

                        <p class="fs-5 text-muted">
                            Our goal is to create journeys that leave lasting memories and
                            help travelers experience the true spirit of Africa.
                        </p>

                        <p class="fs-5 text-muted">
                            Thank you for allowing us to be part of your adventure."
                        </p>

                        <h5 class="mt-4 mb-0 fw-bold">
                            — Founder & CEO, InAfrica
                        </h5>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- Mission & Vision -->
<section class="py-5">
    <div class="container">

        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">Our Mission</h3>

                        <p class="text-muted">
                            To provide exceptional travel experiences that inspire
                            discovery, celebrate African heritage, and create memories
                            that last a lifetime.
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">Our Vision</h3>

                        <p class="text-muted">
                            To become Africa's most trusted travel company by delivering
                            authentic, memorable, and life-changing journeys.
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose InAfrica?</h2>
        </div>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Expert Local Guides</h5>
                        <p class="text-muted">
                            Experience Africa through the eyes of knowledgeable professionals.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Tailor-Made Adventures</h5>
                        <p class="text-muted">
                            Personalized itineraries designed around your travel dreams.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Exceptional Service</h5>
                        <p class="text-muted">
                            Dedicated support from planning to the end of your journey.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- Values -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Values</h2>
        </div>

        <div class="row">

            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Passion</h5>
                <p class="text-muted">We love creating extraordinary travel experiences.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Integrity</h5>
                <p class="text-muted">We operate with honesty and professionalism.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Excellence</h5>
                <p class="text-muted">We strive to exceed expectations in every journey.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Sustainability</h5>
                <p class="text-muted">We support responsible tourism and local communities.</p>
            </div>

        </div>

    </div>
</section>


<!-- Statistics -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-5">By The Numbers</h2>

        <div class="row">

            <div class="col-md-3 mb-4">
                <h1 class="fw-bold text-warning">10+</h1>
                <p>Years Experience</p>
            </div>

            <div class="col-md-3 mb-4">
                <h1 class="fw-bold text-warning">5000+</h1>
                <p>Happy Travelers</p>
            </div>

            <div class="col-md-3 mb-4">
                <h1 class="fw-bold text-warning">100+</h1>
                <p>Tour Packages</p>
            </div>

            <div class="col-md-3 mb-4">
                <h1 class="fw-bold text-warning">98%</h1>
                <p>Customer Satisfaction</p>
            </div>

        </div>

    </div>
</section>


<!-- Testimonials -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">What Our Travelers Say</h2>
        </div>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-muted">
                            "An unforgettable safari experience. Everything was perfectly organized."
                        </p>

                        <h6 class="fw-bold">Sarah M.</h6>
                        <small>United Kingdom</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-muted">
                            "Professional guides and incredible memories. Highly recommended."
                        </p>

                        <h6 class="fw-bold">David K.</h6>
                        <small>Canada</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-muted">
                            "The best way to discover Africa. Exceptional service throughout."
                        </p>

                        <h6 class="fw-bold">Emma R.</h6>
                        <small>Australia</small>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- Call To Action -->
<section class="py-5 text-white" style="background:#1d3557;">
    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Start Your African Adventure
        </h2>

        <p class="mb-4">
            Whether you're seeking wildlife, culture, mountains, or beaches,
            we're here to help you create memories that last forever.
        </p>

        <a href=" class="btn btn-warning px-4 py-2">
            Explore Our Tours
        </a>

    </div>
</section>
@endsection


