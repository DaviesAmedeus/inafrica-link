<div>
    <div class="row g-5">

        <!-- LEFT -->
        <div class="col-lg-8">

            {{-- TOUR HEADER --}}
            <div class="mb-5">

                {{-- <span class="badge bg-primary mb-3 px-3 py-2">
                        Featured Tour
                    </span> --}}

                <h1 class="mb-3 font-weight-bold"> {{ $tour->title }} </h1>

                <p class="text-muted" style="line-height: 1.9; font-size: 16px; white-space: pre-line;">
                    {{ $tour->description }}
                </p>

            </div>

            {{-- TOUR INFO --}}
            <div class="row g-4 mb-5">

                <div class="col-md-4">

                    <div class="border rounded text-center p-4 h-100">

                        <div class="mb-3">

                            <i class="fa fa-hotel" style="font-size: 32px; color:#C17817;"></i>

                        </div>

                        <h6 class="font-weight-bold mb-2">
                            Accommodation
                        </h6>

                        <p class="text-muted mb-0">
                            5-Star Suite
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="border rounded text-center p-4 h-100">

                        <div class="mb-3">

                            <i class="fa fa-utensils" style="font-size: 32px; color:#C17817;"></i>

                        </div>

                        <h6 class="font-weight-bold mb-2">
                            Meals
                        </h6>

                        <p class="text-muted mb-0">
                            Breakfast & Dinner
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="border rounded text-center p-4 h-100">

                        <div class="mb-3">

                            <i class="fa fa-language" style="font-size: 32px; color:#C17817;"></i>

                        </div>

                        <h6 class="font-weight-bold mb-2">
                            Language
                        </h6>

                        <p class="text-muted mb-0">
                            English / Swahili
                        </p>

                    </div>

                </div>

            </div>

            <!-- TABS START -->

            <div class="card border-0">

                {{-- NAVIGATION --}}
                <div class=" bg-white border-0 pt-4">

                    <ul class="nav nav-pills tour-tabs">

                        <li class="nav-item mr-2">

                            <a wire:click="selectTab('overview')"
                                class="nav-link {{ $tab == 'overview' ? 'active' : '' }} px-4" data-bs-toggle="pill"
                                href="#overview" role="tab">
                                Overview
                            </a>

                        </li>

                        <li class="nav-item mr-2">

                            <a wire:click="selectTab('itinerary')" role="tab" href="#itinerary"
                                class="nav-link {{ $tab == 'itinerary' ? 'active' : '' }} px-4" data-bs-toggle="pill">
                                Itinerary
                            </a>

                        </li>

                        <li class="nav-item">

                            <a wire:click="selectTab('includes')" role="tab" href="#includes"
                                class="nav-link {{ $tab == 'includes' ? 'active' : '' }} px-4" data-bs-toggle="pill">
                                Includes & Excludes
                            </a>

                        </li>

                    </ul>

                </div>
                <!-- TABS END -->

                {{-- CONTENT --}}
                <div class="card-body p-4">

                    <div class="tab-content">

                        {{-- OVERVIEW --}}
                        <div class="tab-pane fade show {{ $tab == 'overview' ? 'show active' : '' }}" id="overview"
                            role="tabpanel">

                            <div class="text-muted" style="line-height:1.9;">
                                {!! $tour->overview !!}
                            </div>
                        </div>

                        {{-- ITINERARY --}}
                        <div class="tab-pane fade {{ $tab == 'itinerary' ? 'show active' : '' }}" id="itinerary"
                            role="tabpanel">

                            <div class="accordion mb-3" id="tourAccordion">
                                @foreach ($tour->itinerary as $index => $item)
                                    <div class="accordion-item border-start">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed " type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="collapse{{ $index }}"
                                                style="color:#cc9855;">
                                                {{ $item['title'] }}
                                            </button>
                                        </h2>

                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#tourAccordion">
                                            <div class="accordion-body text-muted"
                                                style="line-height:1.8; white-space: pre-line;">
                                                {{ $item['content'] ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>

                        {{-- INCLUDES --}}
                        <div class="tab-pane fade {{ $tab == 'includes' ? 'show active' : '' }}" id="includes"
                            role="tabpanel">

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <h5 class="font-weight-bold mb-3">

                                        <i class="fa fa-check-circle mr-2 text-success"></i>
                                        Includes

                                    </h5>

                                    <ul class="list-unstyled">

                                          @foreach ($tour->costItems->where('type', 'include') as $item)

                                        <li class="mb-2">
                                            <i class="fa fa-check mr-2 text-success"></i>
                                            {{ $item->item }}

                                        </li>

                                        @endforeach



                                    </ul>

                                </div>

                                <div class="col-md-6">

                                    <h5 class="font-weight-bold mb-3">

                                        <i class="fa fa-times-circle mr-2 text-danger"></i>
                                        Excludes

                                    </h5>

                                    <ul class="list-unstyled">
                                           @foreach ($tour->costItems->where('type', 'exclude') as $item)
                                        <li class="mb-2">
                                            <i class="fa fa-times mr-2 text-danger"></i>
                                             {{ $item->item }}
                                        </li>
                                        @endforeach


                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-lg rounded-lg overflow-hidden">

                {{-- HEADER --}}
                <div class="p-4 text-white" style="background: linear-gradient(135deg, #C17817, #c17717f1);">

                    <div class="d-flex align-items-center">



                        <div>

                            <small class="d-block text-light">
                                Ready For Adventure?
                            </small>

                            <h4 class="mb-0 font-weight-bold text-light">
                                Book This Tour
                            </h4>

                        </div>

                    </div>

                </div>

                {{-- BODY --}}
                <div class="p-4">

                    @forelse ($tour->tourPrices as $price)
                        <div class="mb-4 p-4 rounded-lg border"
                            style="background: #f8f9fa; border-color: #e9ecef !important;">
                            {{-- TOP --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted d-block mb-1">Package For</small>
                                    <h5 class="mb-0 font-weight-bold">
                                        {{ $price->people }}
                                        {{ $price->people == 1 ? 'Adult' : 'Adults' }}
                                    </h5>
                                </div>
                                <div class="text-right">
                                    <small class="text-muted d-block mb-1">
                                        Price Per Person
                                    </small>
                                    <h3 class="mb-0 font-weight-bold" style="color:#28a745;">
                                        ${{ number_format($price->price, 2) }}
                                    </h3>
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <a href="booking.html" class="btn btn-primary btn-block py-2 font-weight-bold"
                                style="border-radius: 10px;">

                                <i class="fa fa-check-circle mr-2"></i>
                                Book Now
                            </a>
                        </div>

                    @empty

                        <div class="text-center py-5">
                            <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 90px; height: 90px; background: #fff3cd;">
                                <i class="fa fa-hourglass-half" style="font-size: 36px; color: #f0ad4e;"></i>
                            </div>

                            <h5 class="font-weight-bold mb-3">
                                Pricing Coming Soon
                            </h5>

                            <p class="text-muted mb-0 mx-auto" style="max-width: 300px; line-height: 1.7; ">
                                Pricing details for this tour are currently unavailable.
                                Please check again later.
                            </p>

                        </div>
                    @endforelse

                </div>

            </div>

        </div>

    </div>
</div>
