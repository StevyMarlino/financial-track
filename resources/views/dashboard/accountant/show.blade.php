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

            <div class="table-responsive-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name of Host</th>
                            <th scope="col">Name of Customers</th>
{{--                            <th scope="col">Price</th>--}}
                            <th scope="col">Services</th>
                            <th scope="col">Register by</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($domains as $items)
                        <tr>
                            <td>{{ $items->name_host}}</td>
                            <td>{{ $items->name_customer }}</td>
{{--                            <td>{{ $items->price }}</td>--}}
                            <td>{{ $items->service }}</td>
                            <td>{{ $items->name }}</td>
                            <td>{{ $items->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{ $domains->links() }}
        </div>

    </div>

@endsection
