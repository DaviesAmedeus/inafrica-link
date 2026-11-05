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
                            <a href="{{ route('about') }}"
                            class="nav-item nav-link  {{ Route::is('about') ? 'active' : '' }}">About</a>
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
                            <div class="nav-item dropdown" style="background-color: rgb(128, 119, 0);">
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
