@extends('layouts.guest')

@section('content')
   <!--begin::Form-->
   <form class="form w-100" action="{{ route('admin.login') }}" method="POST">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">
            Admin Sign In
        </h1>
        <!--end::Title-->
    </div>
    <!--begin::Heading-->

    <!--begin::Input group--->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email') }}"/>
        <!--end::Email-->
    </div>

    <!--end::Input group--->
    <div class="fv-row mb-3">
        <!--begin::Password-->
        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" value="{{ old('password') }}"/>
        <!--end::Password-->
    </div>
    <!--end::Input group--->

    <!--begin::Wrapper-->
    {{-- <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>

        <!--begin::Link-->
        <a href="{{ route('password.request') }}" class="link-primary">
            Forgot Password ?
        </a>
        <!--end::Link-->
    </div> --}}
    <!--end::Wrapper-->

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <span class="indicator-label">Sign In</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Submit button-->
</form>
<!--end::Form-->
@endsection
