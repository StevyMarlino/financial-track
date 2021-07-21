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
    <div class="card card-bleed shadow-light-lg mb-6" style="width: 134%">
        <div class="card-header">

            <!-- Heading -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add User
            </button>

            <!-- Modal add user -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form method="post" action="{{ route('userSave') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <!-- Name of user-->
                                        <div class="form-group">
                                            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" type="text" placeholder="Name Of User">
                                        </div>

                                        @error('name')
                                        <div class="alert alert-danger">  {{ $message }} </div>
                                        @enderror

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Last Name -->
                                        <div class="form-group">
                                            <input class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" name="last_name" id="last_name" type="text" placeholder="Last Name">
                                        </div>
                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- email -->
                                        <div class="form-group">
                                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" type="email" placeholder="Email">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Phone number -->
                                        <div class="form-group">
                                            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" type="phone" placeholder="Phone number">
                                        </div>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- role -->
                                        <div class="form-group ">
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option disabled selected hidden>ROLE ...</option>
                                                <option value="accountant">Accountant</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                        @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Password -->
                                        <div class="form-group">
                                            <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" type="password" placeholder="Password" minlength="8">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!--Confirm Password -->
                                        <div class="form-group">
                                            <input class="form-control @error('password') is-invalid @enderror" value="{{ old('confirm_password') }}" name="password_confirmation" id="confirm_password" type="password" placeholder="Confirm Password" >
                                        </div>
                                        @error('confirm_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
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
            <!-- End Modal -->
            <!-- Modal update user-->
            @foreach($users as $user)
            <div class="modal fade" id="staticBackdrop1{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update User <b>{{ $user->name }}</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">

                            <!-- Form -->
                            <form method="post" action="{{ route('userUpdate',$user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <!-- Name of user-->
                                        <div class="form-group">
                                            <input class="form-control" value="{{ $user->id }}" name="id"  type="hidden" >

                                            <input class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name"  type="text" >
                                        </div>

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Last Name -->
                                        <div class="form-group">
                                            <input class="form-control @error('last_name') is-invalid @enderror" value="{{ $user->last_name }}" name="last_name" type="text">
                                        </div>
                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- email -->
                                        <div class="form-group">
                                            <input class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" type="email">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Phone number -->
                                        <div class="form-group">
                                            <input class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" name="phone" type="phone">
                                        </div>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update user</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Modal -->

        </div>

        <div class="table-responsive-md" >
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name </th>
                        <th scope="col">Last name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th style="width:20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $items)
                    <tr>
                        <td> {{ $items->name}}</td>
                        <td>{{ $items->last_name}}</td>
                        <td>{{ $items->phone }}</td>
                        <td>{{ $items->email }}</td>
                        <td>
                            <form action="{{ route('UserDestroy',$items->id) }}" method="post">
                                <a class="btn btn-primary" href="{{ route('userUpdate',$items->id) }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $items->id }}">
                                    <i class="fas fa-user-edit"></i>
                                </a>

                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


