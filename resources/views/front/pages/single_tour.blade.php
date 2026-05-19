@extends('front.layout.pages-layout')
@section('meta_tags')
{!! SEO::generate() !!}
@endsection
@section('breadcrumb-section')
    <!-- Breadcrumb Start -->
    <x-front.breadcrumb img_link="storage/images/tours/{{ $tour->breadcrumb_img_tour }}">
        {{ $tour->title }}
    </x-front.breadcrumb>
    <!-- Breadcrumb End -->
@endsection
@section('content')
    <div class="container py-5">
        @livewire('front.single-tour', ['tour'=>$tour])
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
                                    <input type="text" class="form-control border-0" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="number">Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="subject"
                                        placeholder="Subject">
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
