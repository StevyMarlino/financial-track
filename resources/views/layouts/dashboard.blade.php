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
    {{--    <link rel="stylesheet" href="fonts/Feather/feather.css">--}}
    <link rel="stylesheet" href="{{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flickity-fade/flickity-fade.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flickity/dist/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/highlightjs/styles/vs2015.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/jarallax/dist/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/quill/dist/quill.core.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Map -->
    <link href='{{ asset('api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css') }}' rel='stylesheet'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

                            <ul class="card-list list text-gray-700 mb-6">

                                <li class="list-item active">
                                    <a class="list-link text-reset" href="{{ route('home') }}">
                                        Dashboard
                                    </a>
                                </li>

                                @if( auth()->user()->isUser() or auth()->user()->isAdmin())

                                    <li class="list-item">
                                        <a class="list-link text-reset" href="{{ route('myDomain') }}">
                                            My Domains
                                        </a>
                                    </li>

                                @endif

                            </ul>

                        @if( auth()->user()->isAccountant() || auth()->user()->isAdmin())
                            <!-- Heading -->
                                <h6 class="font-weight-bold text-uppercase mb-3">
                                    DEPARTEMENTS
                                </h6>

                                <!-- List -->
                                <ul class="card-list list text-gray-700 mb-0">
                                    <li class="list-item">
                                        <a class="list-link text-reset dropdown-toggle" data-bs-toggle="dropdown"
                                           aria-expanded="false" href="{{ route('setting') }}">
                                            Cloudhost
                                        </a>

                                        <!-- PAGE EN COMMENTAIRE SERONT TRAITES UNE AUTRE FOIS -->
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('all-domain-registered') }}"
                                                   class="list-link text-reset dropdown-item"> All domain </a></li>
                                            {{--                                            <li><a href="" class="list-link text-reset dropdown-item"> Website Ongoing</a></li>--}}
                                        </ul>
                                    </li>
                                    {{--                                    <li class="list-item">--}}
                                    {{--                                        <a class="list-link text-reset" href="{{ route('setting') }}">--}}
                                    {{--                                            Pixel--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="list-item">--}}
                                    {{--                                        <a class="list-link text-reset" href="{{ route('setting') }}">--}}
                                    {{--                                            SMS--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="list-item">--}}
                                    {{--                                        <a class="list-link text-reset" href="{{ route('setting') }}">--}}
                                    {{--                                            Payam--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>

                                @if(auth()->user()->isAdmin())

                                    <h6 class="font-weight-bold text-uppercase mb-3 mt-5">
                                        User Account
                                    </h6>

                                    <!-- List -->
                                    <ul class="card-list list text-gray-700 mb-0">
                                        <li class="list-item">
                                            <a class="list-link text-reset" href="{{ route('user.index') }}">
                                                List Users
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                            <h6 class="font-weight-bold text-uppercase mb-3 mt-5">
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

<!-- SHAPE
================================================== -->
<div class="position-relative mt-n11">
    <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/>
        </svg>
    </div>
</div>

<!-- FOOTER
================================================== -->
<section class="pt-11 bg-dark">
    <footer class="py-8 py-md-11 bg-dark">

    </footer>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Map -->
    <script src='{{ asset('api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js') }}'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>

    <!-- Theme JS -->
    <script src="{{ asset('js/theme.min.js') }}"></script>

    <script>
        @if(session()->has('message'))
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success("{{ session('message') }}");
        @endif
            @if(session()->has('error'))
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error("{{ session('error') }}");
        @endif
    </script>

    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function() {
                $('#datatable').DataTable();
        } );
    </script>



@yield('script')

</body>

</html>
