<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flickity-fade/flickity-fade.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flickity/dist/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/highlightjs/styles/vs2015.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/jarallax/dist/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/quill/dist/quill.core.css') }}"/>

    <!-- Map -->
    <link href='{{ asset('api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css') }}' rel='stylesheet'/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <!--===============================================================================================-->

    @yield('style')
</head>
<body>

<!--header -->
<header class="bg-dark pt-9 pb-11 d-none d-md-block">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col">

                <!-- Heading -->
                <h1 class="font-weight-bold text-white mb-2">
                    @yield('heading')
                </h1>

                <!-- Text -->
                <p class="font-size-lg text-white-75 mb-0">
                    for <a class="text-reset" href="mailto:{{ Auth::user()->email }}"> {{ Auth::user()->email }}</a>
                </p>

            </div>
            <div class="col-auto">

                <!-- Button -->
                <a href="{{ route('logout') }}" class="btn btn-sm btn-gray-300-20 text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Log Out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</header>
<!-- end header -->

<!-- main -->
<main class="pb-8 pb-md-11 mt-md-n6">
    <div class="container-md">
        <div class="row">
            <div class="col-12 col-md-3">

                <!-- Card -->
                <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg">

                    <!-- Collapse -->
                    <div class="collapse d-md-block" id="sidenavCollapse">
                        <div class="card-body">

                            <!-- Heading -->
                            <h6 class="font-weight-bold text-uppercase mb-3">
                                Account
                            </h6>

                            <!-- List -->
                            <ul class="card-list list text-gray-700 mb-6">
                                <li class="list-item active">
                                    <a class="list-link text-reset" href="{{ route('home') }}">
                                        General
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a class="list-link text-reset" href="{{ route('myDomain') }}">
                                        My Domains
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a class="list-link text-reset" href="#">
                                        All Domains
                                    </a>
                                </li>
                            </ul>

                            <!-- Heading -->
                            <h6 class="font-weight-bold text-uppercase mb-3">
                                Settings
                            </h6>

                            <!-- List -->
                            <ul class="card-list list text-gray-700 mb-0">
                                <li class="list-item">
                                    <a class="list-link text-reset" href="{{ route('setting') }}">
                                        Settings
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>

            </div>
            @yield('content')
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</main>
<!-- end main -->

<!-- JAVASCRIPT
    ================================================== -->
<!-- Libs JS -->
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('libs/aos/dist/aos.js') }}"></script>
<script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('libs/countup.js/dist/countUp.min.js') }}"></script>
<script src="{{ asset('libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('libs/flickity/dist/flickity.pkgd.min.js') }}"></script>
<script src="{{ asset('libs/flickity-fade/flickity-fade.js') }}"></script>
<script src="{{ asset('libs/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ asset('libs/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('libs/isotope-layout/dist/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('libs/jarallax/dist/jarallax.min.js') }}"></script>
<script src="{{ asset('libs/jarallax/dist/jarallax-video.min.js') }}"></script>
<script src="{{ asset('libs/jarallax/dist/jarallax-element.min.js') }}"></script>
<script src="{{ asset('libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('libs/smooth-scroll/dist/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('libs/typed.js/lib/typed.min.js') }}"></script>

<!-- Map -->
<script src='{{ asset('api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js') }}'></script>

<!-- Theme JS -->
<script src="{{ asset('js/theme.min.js') }}"></script>

@yield('script')

</body>

</html>
