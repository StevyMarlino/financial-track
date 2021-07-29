@extends('layouts.dashboard')

@section('title')
    Invoices Paid
@endsection

@section('heading')
    Invoices Paid
@endsection

@section('content')

    <div class="col-12 col-md-12">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6">

            <div class="table-responsive-md-12" style="width: 99%;padding: 1%;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tableauInvoices as $inv)

                        <tr>
                            <td> {{ $inv['id'] }}</td>
                            <td>{{ $inv['status'] }}</td>
                            <td>{{ $inv['total'] }}</td>
                            <td>{{ $inv['date'] }}</td>
                            <td><a href="{{ route('details',$inv['id']) }} " class="btn  btn-primary">View</a>
                                @if( in_array($inv['id'],$domains))
                                    <a class="btn  btn-success">
                                        Verified</a>
                                @else
                                    <a href="{{ route('mark',$inv['id']) }}" class="btn  btn-warning">Mark as
                                        Verified</a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection
