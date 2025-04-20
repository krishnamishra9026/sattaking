@extends('layouts.frontend')

@section('content')

   <div class="container userstep mt-18">
      <div class="row">
        <div class="col-md-12">
            <form action="{{ route('setup.one.store') }}" class="form auth-step-form-box form-style w-lg-600px" novalidate="novalidate" Method="POST">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bolder mb-4">
                        Personal Info
                    </h1>
                    <!--end::Title-->
                    <div class="text-gray-800 fw-semibold fs-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                </div>
                <!--begin::Heading-->

                <div class="step-bars">
                    <div class="horizontal-line"></div>
                    <div class="step-wrapper">
                        <div class="step">
                            <span class="active"></span>
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
                            <span></span>
                            <p class="title">STEP 5</p>
                        </div>
                    </div>
                </div>

                <!--begin::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Name</label>
                    <input type="text" placeholder="Enter your name" name="name" value={{ old('name',$user->name) }} autocomplete="off" class="form-control bg-transparent" />
                    @error('name')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Email</label>
                    <input readonly type="text" placeholder="Enter your email" name="email" value={{ old('email',$user->email) }} autocomplete="off" class="form-control bg-transparent"/>
                    @error('email')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Phone</label>
                    <input type="text" placeholder="Enter your phone number" name="phone" value="{{ old('phone',$userInfo?->phone) }}" autocomplete="off" class="form-control bg-transparent"/>
                    @error('phone')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$userInfo?->date_of_birth) }}" class="form-control bg-transparent"/>
                    @error('date_of_birth')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Gender</label>
                    <select class="form-select" name="gender">
                        <option value="">Select gender</option>
                        <option value="Male" @if(old('gender',$userInfo?->gender) == 'Male') selected @endif>Male</option>
                        <option value="Female"  @if(old('gender',$userInfo?->gender) == 'Female') selected @endif>Female</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Nationality</label>
                    <select class="form-select" name="nationality">
                        <option value="">Select nationality</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" @if(old('nationality',$userInfo?->nationality) == $country->name) selected @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('nationality')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <label class="form-label fs-4">Location</label>
                    <input type="text" placeholder="Enter your location" name="location" value="{{ old('location',$userInfo?->location) }}" autocomplete="off" class="form-control bg-transparent"/>
                    @error('location')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->
                <div class="fv-row mb-8">
                    <label class="form-label fs-4">Full address</label>
                    <textarea class="form-control bg-transparent" rows="5" data-kt-autosize="true" name="address">{{ old('address',$userInfo?->address) }}</textarea>
                    @error('address')
                        <span class="invalid-feedback show-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group--->

                <!--begin::Submit button-->
                <div class="text-center">
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
