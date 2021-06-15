@extends('layouts.dashboard')

@section('title')
    All Domain Registered
@endsection

@section('heading')
    All Domain Registered
@endsection

@section('content')

    <div class="col-12 col-md-9">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6">

            <div class="table-responsive-md-12" style="width: 132%">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>name of Host</th>
                            <th>name of Customer</th>
                            <th>Price</th>
                            <th>Services</th>
                            <th>Register by</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domains as $domain)
                        <tr>
                            <td> {{ $domain->name_host}}</td>
                            <td>{{ $domain->name_customer}}</td>
                            <td>{{ $domain->price }}</td>
                            <td>{{ $domain->service }}</td>
                            <td>{{ $domain->name }}</td>
                            <td>{{ $domain->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection
