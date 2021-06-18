@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('heading')
    Dashboard
@endsection


@section('content')

    <div class="col-12 col-md-9">

        <!-- Card -->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow-light-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">monthly recipes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $sale_of_current_month }} XAF</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            @if($sale_of_current_month > $sale_of_last_month )
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $percent_of_recipes }} %</span>
                            @else
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> {{ $percent_of_recipes }} %</span>
                            @endif
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 pb-16">
                <div class="card card-stats mb-4 mb-xl-0 shadow-light-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Verified Payments</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $domain_verify }}/ {{ $domain_paid }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-danger mr-2"></span>
                            <span class="text-nowrap"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>


@endsection
