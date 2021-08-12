<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  	<title>{{ config('app.name', 'Track Finance') }} </title>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('loginPage/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	</head>
	<body class="img js-fullheight" style="background-image: url(loginPage/images/bg.jpg);">
	<section class="ftco-section">
        <div id="app">

            @yield('content')

        </div>

        <div id="dropDownSelect1"></div>

	</section>


	<script src="{{ asset('loginPage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('loginPage/js/popper.js') }}"></script>
    <script src="{{ asset('loginPage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginPage/js/main.js') }}"></script>

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
    </script>

    @yield('js')

	</body>
</html>
