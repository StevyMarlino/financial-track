@extends('layouts.dashboard')

@section('content')
    <section>
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
          <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">

            <!-- Heading -->
            <h1 class="display-3 font-weight-bold">
              Uh Oh.
            </h1>

            <!-- Text -->
            <p class="mb-5 text-muted">
              We ran into an issue, but don’t worry, we’ll take care of it for sure.
            </p>

            <!-- Link -->
            <a class="btn btn-primary" href="{{ route('login') }}">
              Back to safety
            </a>

          </div>
          <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

            <!-- Image -->
            <div class="h-100 w-cover bg-cover" style="background-image: url(img/cover-16.jpg);"></div>

            <!-- Shape -->
            <div class="shape shape-left shape-fluid-y svg-shim text-white">
              <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

@endsection
