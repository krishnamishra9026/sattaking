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
                        Work Experience
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
                            <span class="active"></span>
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
                    <label class="form-label fs-4">Company Name</label>
                    <input type="text" placeholder="Enter your company name" name="company_name" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Job Title</label>
                    <input type="text" placeholder="Enter your job title" name="job_title" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <!--end::Input group--->

                <div class="row mb-5">
                    <div class="col-md-6 col-12">
                        <label class="form-label fs-4">Start Date</label>
                        <input type="date" placeholder="Enter your job title" name="job_title" autocomplete="off" class="form-control bg-transparent" />
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label fs-4">End Date</label>
                        <input type="date" placeholder="Enter your job title" name="job_title" autocomplete="off" class="form-control bg-transparent" />
                    </div>
                </div>
                <!--end::Input group--->

                <div class="fv-row mb-8">
                    <label class="form-label fs-4">Job Description</label>
                    <textarea class="form-control bg-transparent" rows="5" data-kt-autosize="true"></textarea>
                </div>
                <!--end::Input group--->


                <!--begin::Submit button-->
                <div class="justify-content-between d-flex align-items-center">
                    <a href="{{ route('profile.setup.three') }}" class="btn btn-dark">
                        Go Back
                    </a>
                    <a href="{{ route('profile.setup.five') }}" class="btn btn-success">
                        Next
                    </a>
                </div>
                <!--end::Submit button-->


            </form>
        </div>
    </div>
</div>


@endsection
