@extends('layouts.frontend')

@section('content')
<div class="container userstep mt-18">
    <div class="row">
        <div class="col-md-12">
            <form class="form auth-step-form-box form-style w-lg-600px" novalidate="novalidate">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bolder mb-4">
                        Resume & Portfolio
                    </h1>
                    <!--end::Title-->
                    <div class="text-gray-800 fw-semibold fs-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                </div>
                <!--begin::Heading-->

                <div class="step-bars">
                    <div class="horizontal-line"></div>
                    <div class="step-wrapper">
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 1</p>
                        </div>
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 2</p>
                        </div>
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 3</p>
                        </div>
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 4</p>
                        </div>
                        <div class="step">
                            <span class="active"></span>
                            <p class="title">STEP 5</p>
                        </div>
                    </div>
                </div>

                <!--begin::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Upload Resume</label>
                    <input type="file" name="upload_resume" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <!--end::Input group--->

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <label class="form-label fs-4">Portfolio Link</label>
                    <input type="text" placeholder="Enter your portfolio link" name="portfolio_link" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <!--end::Input group--->


                <!--begin::Submit button-->
                <div class="justify-content-between d-flex align-items-center">
                    <a href="{{ route('profile.setup.four') }}" class="btn btn-dark">
                        Go Back
                    </a>
                    <a href="#" class="btn btn-success">
                        Finish setup
                    </a>
                    {{-- <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        @include('partials/general/_button-indicator', ['label' => 'Next'])
                    </button> --}}
                </div>
                <!--end::Submit button-->


            </form>
        </div>
    </div>
</div>

@endsection
