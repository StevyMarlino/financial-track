@extends('layouts.dashboard')

@section('title')
    My Domain
@endsection

@section('heading')
    My Domain
@endsection

@section('content')

    <div class="col-12 col-md-9">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6" style="width: 132%">
            <div class="card-header">

                <!-- Heading -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Register New Domain
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">New Order Domain / Host Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <!-- Form -->
                                <form method="post" action="{{ route('store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-6">

                                            <!-- Name of customer-->
                                            <div class="form-group">
                                                <input class="form-control @error('name_customer') is-invalid @enderror" value="{{ old('name_customer') }}" name="name_customer" value="" id="name_customer" type="text" placeholder="Name Of Customer">
                                            </div>

                                            @error('name_customer')
                                            <div class="alert alert-danger">  {{ $message }} </div>
                                            @enderror

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Name of Host -->
                                            <div class="form-group">
                                                <input class="form-control @error('name_host') is-invalid @enderror" value="{{ old('name_host') }}" name="name_host" id="name_host" type="text" placeholder="Name Of Host">
                                            </div>
                                            @error('name_host')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Price -->
                                            <div class="form-group ">
                                                <select name="price" class="form-control @error('price') is-invalid @enderror">
                                                    <option disabled selected hidden>PRICE ...</option>
                                                    <option value="10000">10 000 XAF</option>
                                                    <option value="15000">15 000 XAF</option>
                                                    <option value="20000">20 000 XAF</option>
                                                    <option value="25000">25 000 XAF</option>
                                                    <option value="30000">30 000 XAF</option>
                                                    <option value="40000">40 000 XAF</option>
                                                    <option value="50000">50 000 XAF</option>
                                                </select>
                                            </div>
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Service -->
                                            <div class="form-group">
                                                <select name="service" class="form-control @error('service') is-invalid @enderror">
                                                    <option disabled selected hidden>SERVICE ...</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="RENEW">RENEW</option>
                                                    <option value="REGISTER">REGISTER</option>
                                                </select>
                                            </div>
                                            @error('service')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12">

                                            <!-- Payment Method -->
                                            <select name="method_payment" class="form-control @error('method_payment') is-invalid @enderror">
                                                <option selected disabled hidden>METHODE PAYEMENT...</option>
                                                <option value="ORANGE MONEY">ORANGE MONEY</option>
                                                <option value="MTN MONEY">MTN MONEY</option>
                                                <option value="CASH">CASH</option>
                                            </select>
                                            @error('method_payment')
                                            <div class="alert alert-danger mt-2">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Saves Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-responsive-md" >
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name of Host</th>
                            <th>Name of Customer</th>
                            <th>Price</th>
                            <th>Services</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domain as $items)
                        <tr>
                            <td> {{ $items->name_host}} @if($items->verify) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg> @endif</td>
                            <td>{{ $items->name_customer}}</td>
                            <td>{{ $items->price }}</td>
                            <td>{{ $items->service }}</td>
                            <td>{{ $items->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

