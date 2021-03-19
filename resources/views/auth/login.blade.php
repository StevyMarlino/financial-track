@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('login/images/bg-01.jpg') }}');">
            <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('') }}">
                    @csrf
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
