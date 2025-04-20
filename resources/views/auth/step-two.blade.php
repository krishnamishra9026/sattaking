@extends('layouts.frontend')

@section('content')
    <div class="container userstep mt-18">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('setup.two.store') }}" method="POSt" class="form auth-step-form-box form-style w-lg-600px" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-4">
                            Professional Summary
                        </h1>
                        <!--end::Title-->
                        <div class="text-gray-800 fw-semibold fs-6">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
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
                                <span class="active"></span>
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
                                <span></span>
                                <p class="title">STEP 5</p>
                            </div>
                        </div>
                    </div>

                    <!--begin::Input group--->
                    <div class="fv-row mb-5">
                        <label class="form-label fs-4">Job title</label>
                        <input type="text" placeholder="Enter your job title" name="job_title" value="{{ old('job_title',$userInfo?->job_title) }}" autocomplete="off"
                            class="form-control bg-transparent" />
                            @error('job_title')
                            <span class="invalid-feedback show-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group--->
                    <div class="fv-row mb-5">
                        <label class="form-label fs-4">Industry</label>
                        <select class="form-select" name="industry">
                            <option value="">Select industry</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->title }}" @if($industry->title == old('industry',$userInfo?->industry)) selected @endif>{{ $industry->title }}</option>
                            @endforeach
                        </select>
                        @error('industry')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <!--end::Input group--->
                    <div class="fv-row mb-5">
                        <label class="form-label fs-4">Bio</label>
                        <textarea class="form-control bg-transparent" data-kt-autosize="true" name="bio">{{ old('bio',$userInfo?->bio) }}</textarea>
                        @error('bio')
                            <span class="invalid-feedback show-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group--->
                    <div class="fv-row mb-5">
                        <label class="form-label fs-4">Experience</label>
                        <select name="experience" class="form-select" id="experience">
                            <option value="">Please Select</option>
                            <option @if (old('experience',$userInfo?->experience) == '0-1 years') selected @endif value="0-1 years">0-1 years</option>
                            <option @if (old('experience',$userInfo?->experience) == '1-2 years') selected @endif value="1-2 years">1-2 years</option>
                            <option @if (old('experience',$userInfo?->experience) == '2-4 years') selected @endif value="2-4 years">2-4 years</option>
                            <option @if (old('experience',$userInfo?->experience) == '4-6 years') selected @endif value="4-6 years">4-6 years</option>
                            <option @if (old('experience',$userInfo?->experience) == '6-8 years') selected @endif value="6-8 years">6-8 years</option>
                            <option @if (old('experience',$userInfo?->experience) == '8-10 years') selected @endif value="8-10 years">8-10 years
                            </option>
                            <option @if (old('experience',$userInfo?->experience) == '10+ years') selected @endif value="10+ years">10+ years</option>
                        </select>
                        @error('experience')
                            <span class="invalid-feedback show-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group--->
                    @php
                        $educations = [
                            'High School Diploma or Equivalent',
                            'Associate Degree',
                            "Bachelor's Degree",
                            "Master's Degree",
                            'Doctorate (Ph.D.)',
                            'Online Courses and MOOCs',
                            'Vocational Training and Apprenticeships',
                            'Military Training and Service',
                            'Non-degree Programs and Workshops',
                        ];
                    @endphp
                
                    <div class="fv-row mb-5">
                        <label class="form-label fs-4">Education</label>
                        <select class="form-select" name="education">
                            <option value="">Select education</option>
                            @foreach ($educations as $education)
                                <option value="{{ $education }}" @if($education == old('education',$userInfo?->education)) selected @endif>{{ $education }}</option>
                            @endforeach
                        </select>
                        @error('education')
                            <span class="invalid-feedback show-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group--->
                    <div class="fv-row mb-5 profile">
                        <label class="form-label fs-4">Profile Picture</label>
                        <div class="fv-row">
                            <div class="image-input image-input-empty" data-kt-image-input="true">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Upload Profile Picture">

                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                            class="path2"></span></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <!--end::Cancel button-->


                            </div>
                            <!--end::Image input-->

                        </div>
                    </div>

                    <!--end::Input group--->

                    <!--begin::Submit button-->
                    <div class="justify-content-between d-flex align-items-center">
                        <a href="{{ route('profile.setup.one') }}" class="btn btn-dark">
                            Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            Next
                        </button>
                    </div>
                    <!--end::Submit button-->


                </form>
            </div>
        </div>
    </div>
@endsection
