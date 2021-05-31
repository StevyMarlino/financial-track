@extends('layouts.dashboard')

@section('title')
    List of users
@endsection

@section('heading')
    List of users
@endsection

@section('content')

    <div class="col-12 col-md-9">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6">

            <div class="table-responsive-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Last Name</th>
                        {{--                            <th scope="col">Price</th>--}}
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $items)
                        <tr>
                            <td>{{ $items->name}}</td>
                            <td>{{ $items->last_name }}</td>
                            <td>{{ $items->phone }}</td>
                            <td>{{ $items->email }}</td>
                            <td>  <span class="fa fa-pencil"></span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{ $users->links() }}
        </div>

    </div>

@endsection
