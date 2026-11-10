<footer>
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">


                                <h4 class="mb-4 text-white"> {{ settings()?->site_title ?? 'Get In Touch' }}</h4>



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
                                @if (site_social_links()?->facebook_url ?? '')
                                    <i class="fas fa-share fa-2x text-white me-2"></i>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1"
                                        href="{{ site_social_links()->facebook_url }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if (site_social_links()?->instagram_url ?? '')
                                    <a class="btn-square btn btn-primary rounded-circle mx-1"
                                        href="{{ site_social_links()->instagram_url }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if (site_social_links()?->linkedin_url ?? '')
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
                                {{-- <div id="TA_excellent805" class="TA_excellent">
                                    <ul id="qLAwcyi" class="TA_links iIsBzzY">
                                        <li id="qVfnXXUYZsI" class="3bXaFKkB"><a target="_blank"
                                                href="https://www.tripadvisor.com/Attraction_Review-g297913-d23589158-Reviews-In_Africa_Link-Arusha_Arusha_Region.html"><img
                                                    src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg"
                                                    alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO" /></a>
                                        </li>
                                    </ul>
                                </div> --}}
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
