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
        <div class="card card-bleed shadow-light-lg mb-6">
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
                                                    <option value="25000">25 000 XAF</option>
                                                    <option value="30000">30 000 XAF</option>
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

            <div class="table-responsive-md">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name of Host</th>
                        <th scope="col">Name of Customers</th>
                        <th scope="col">Price</th>
                        <th scope="col">Services</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domain as $items)
                        <tr>

                            <td>{{ $items->name_host }}</td>
                            <td>{{ $items->name_customer }}</td>
                            <td>{{ $items->price }}</td>
                            <td>{{ $items->service }}</td>
                            <td>{{ $items->created_at }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{ $domain->links() }}
        </div>

    </div>

@endsection
