@extends('layouts.dashboard')

@section('title')
    All Domain Ultimate
@endsection

@section('heading')
    All Domain Ultimate
@endsection

@section('content')

    <div class="col-12 col-md-12">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6">

            <div class="table-responsive-md-12" style="width: 99%;padding: 1%;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100% " >
                    <thead>
                    <tr>
                        <th>name of Host</th>
                        <th>name of Customer</th>
                        <th>Price</th>
                        <th>Services</th>
                        <th>Types</th>
                        <th>Register by</th>
                        <th>Date</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domains as $domain)

                        <tr>
                            <td> {{ $domain->name_host }} @if($domain->verify)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                    </svg> @endif</td>
                            <td>{{ $domain->name_customer}}</td>
                            <td>{{ $domain->price }}</td>
                            <td>{{ $domain->service }}</td>
                            <td>{{ $domain->type }}</td>
                            <td>{{ $domain->name }}</td>
                            <td>{{ $domain->created_at}}</td>
                            <td>@if($domain->invoice_id !== 0)<a href="{{ route('details',$domain->invoice_id) }} " class="btn  btn-primary">View</a>@endif</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection
