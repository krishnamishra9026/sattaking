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
                        Skills & Expertise
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
                            <span class="active"></span>
                            <p class="title">STEP 3</p>
                        </div>
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 4</p>
                        </div>
                        <div class="step">
                            <span></span>
                            <p class="title">STEP 5</p>
                        </div>
                    </div>
                </div>

                <!--begin::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Skills with Proficiency</label>
                    <select class="form-select" data-control="select2" data-close-on-select="false" data-placeholder="Skills with proficiency" data-allow-clear="true" multiple="multiple">
                        <option value="1">Html</option>
                        <option value="2">Css</option>
                    </select>
                </div>
                <!--end::Input group--->

                <div class="fv-row mb-8">
                    <label class="form-label fs-4">Languages known</label>
                    <select class="form-select" data-control="select2" data-close-on-select="false" data-placeholder="Select language" data-allow-clear="true" multiple="multiple">
                        <option value="spanish">Spanish</option>
                        <option value="dutch">Dutch</option>
                        <option value="norwegian">Norwegian</option>
                        <option value="polish">Polish</option>
                    </select>
                </div>
                <!--end::Input group--->


                <!--begin::Submit button-->
                <div class="justify-content-between d-flex align-items-center">
                    <a href="{{ route('profile.setup.two') }}" class="btn btn-dark">
                        Go Back
                    </a>
                    <a href="{{ route('profile.setup.four') }}" class="btn btn-success">
                        Next
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
