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
                        Reset Password
                    </h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="fv-row mb-8">
                            <input id="email" type="email" placeholder="Email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" class="btn btn-primary me-4">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
