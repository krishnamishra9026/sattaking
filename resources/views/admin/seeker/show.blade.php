@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-body">
        <h2>Personal Info</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                        <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                            Name
                        </label>
                    </div>

                    <p>
                        Nurul Hasan
                        <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        {{-- <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i> --}}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Email
                    </label>
                </div>
                <p>
                    nurulhasan129@gmail.com
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Phone
                    </label>
                </div>
                <p>
                    +91 9968584843
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Date of Birth
                    </label>
                </div>
                <p>
                    12-04-2000
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Gender
                    </label>
                </div>
                <p>
                    Male
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Nationality
                    </label>
                </div>
                <p>
                    Indian
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Education
                    </label>
                </div>
                <p>
                    Bachelor's Degree
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Location
                    </label>
                </div>
                <p>
                    Saket, New Delhi
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
        </div>
        <div class="text-left mt-4">
            <a href="javascript:void(0);" class="btn btn-primary btn-sm" >Update</a>
        </div>
        <h2 class="mt-8">Professional Summary</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Job title
                    </label>
                </div>
                <p>
                    CNC Operator
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    Industry
                </label>
                <p>
                    Manufacturing
                </p>
            </div>
            <div class="col-md-12">
                <label class="fw-bolder text-gray-800 mb-1">
                    Bio
                </label>
                <p>
                    We are seeking a highly organized and detail-oriented Logistic Operator to oversee and manage the day-to-day operations of our supply chain. The ideal candidate will ensure the smooth and efficient movement of goods, monitor inventory levels, and coordinate with suppliers, transporters, and warehouse staff.
                </p>
            </div>
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    Experience
                </label>
                <p>
                    1-2 years
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Education
                    </label>
                </div>
                <p>
                    Bachelor's degree
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Profile Picture
                    </label>
                </div>
                <img src="{{ asset('assets/mediaavatars/300-1.jpg') }}" alt="Profile Picture" class="img-fluid" style="max-width:100px">
                <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i> --}}
            </div>
        </div>
        <div class="text-left mt-5">
            <a href="javascript:void(0);" class="btn btn-primary btn-sm" >Update</a>
        </div>
        <h2 class="mt-8">Skills & Expertise</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    Languages Known
                </label>
                <p>
                    English, Spanish
                </p>
            </div>
            <div class="col-md-3">
                <label class="fw-bolder text-gray-800 mb-1">
                    Skills
                </label>

                <div class="d-flex justify-content-between">
                    <div class="ski">
                        <p class="mb-1">SAP</p>
                    </div>
                    <div class="prof">
                        <p class="mb-1"><img style="max-width:15px" src="{{ asset('assets/mediaicons/checked.png') }}" alt=""> 99%
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="ski">
                        <p class="mb-1">Oracle</p>
                    </div>
                    <div class="prof">
                        <p class="mb-1"><img style="max-width:15px" src="{{ asset('assets/mediaicons/checked.png') }}" alt=""> 93%
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="ski">
                        <p class="mb-1">WMS</p>
                    </div>
                    <div class="prof">
                        <p class="mb-1"><img style="max-width:15px" src="{{ asset('assets/mediaicons/checked.png') }}" alt=""> 85%
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-10">Work Experience</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Company Name
                    </label>
                </div>
                <p>
                    HCL Tech
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Job Title
                    </label>
                </div>
                <p>
                    CPC Operator
                    <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                    {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i> --}}
                </p>
            </div>
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    Start Date
                </label>
                <p>
                    10-03-2025
                </p>
            </div>
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    End Date
                </label>
                <p>
                    21-03-2025
                </p>
            </div>
            <div class="col-md-12">
                <label class="fw-bolder text-gray-800 mb-1">
                    Job Description
                </label>
                <p>
                    We are seeking a highly organized and detail-oriented Logistic Operator to oversee and manage the day-to-day operations of our supply chain. The ideal candidate will ensure the smooth and efficient movement of goods, monitor inventory levels, and coordinate with suppliers, transporters, and warehouse staff.
                </p>
            </div>
        </div>
        <div class="text-left mt-4">
            <a href="javascript:void(0);" class="btn btn-primary btn-sm" >Update</a>
        </div>
        <h2 class="mt-8">Resume & Portfolio</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label class="fw-bolder text-gray-800 mb-1">
                    Portfolio link
                </label>
                <p>
                    www.google.com
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label fw-bolder text-gray-800 mb-1" for="flexCheckDefault">
                        Resume
                    </label>
                </div>
                <img src="{{ asset('assets/mediaicons/cvv.png') }}" alt="Resume" class="img-fluid" style="max-width:100px">
                <span><a style="color:#333" href="#"><i style="font-size:30px" class="fa-solid fa-circle-arrow-down"></i></a></span>
                <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i>
                {{-- <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i> --}}
            </div>
        </div>
        <div class="text-left mt-4">
            <a href="javascript:void(0);" class="btn btn-primary btn-sm" >Update</a>
        </div>
    </div>
</div>

@endsection
