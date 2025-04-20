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
                        Employee Sign Up
                        </h1>
                        <!--end::Title-->
                    </div>
                <!--begin::Heading-->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="fv-row mb-8">
                            <input id="name" type="text" class="form-control bg-transparent @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-8">
                            <input id="email" type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-8">
                            <input id="password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-8">
                            <input id="password-confirm" type="password" class="form-control bg-transparent" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                        </div>

                        <div class="fv-row mb-8">
                            <div class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1"/>

                                <label class="form-check-label fw-semibold text-gray-700 fs-6">
                                    I Agree &

                                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign Up') }}
                            </button>
                        </div>

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Already have an Account?

                            <a href="{{ route('login') }}" class="link-primary fw-semibold">
                                Sign in
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
