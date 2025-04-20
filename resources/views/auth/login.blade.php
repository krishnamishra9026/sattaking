@extends('layouts.frontend')

@section('content')
<div class="container loginform">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card auth-fluid-form-box form-style">
                <!--begin::Heading-->
                <div class="text-center mb-3 mt-8">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bolder">
                    Employee Sign In
                    </h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->

                <div class="card-body">
                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong><i class="dripicons-warning me-2"></i> </strong>{{ $message }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="fv-row mb-8">
                            <input id="email" type="email" placeholder="Email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-8">
                            <input id="password" type="password" placeholder="Password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-end">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="d-grid mb-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Not a Member yet?

                            <a href="{{ route('register') }}" class="link-primary">
                                Sign up
                            </a>
                        </div>
                        <!--end::Sign up-->


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
