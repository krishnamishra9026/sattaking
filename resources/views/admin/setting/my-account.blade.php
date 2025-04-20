@extends('layouts.admin')
@section('title', 'My Account | Admin')
@section('content')
    <div class="title mb-4">
        <h1 class="fs-2">My Profile</h1>
    </div>

    <div class="card">
        <form class="form w-100" action="" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 mb-5">
                        <label for="form-label" class="fw-bold mb-2">First Name</label>
                        <input type="text" class="form-control" name="firstname">
                        @error('first_name')
                            <div class="invalid-feedback" style="display:block;">

                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label for="form-label" class="fw-bold mb-2">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                        @error('last_name')
                            <div class="invalid-feedback" style="display:block;">

                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label for="form-label" class="fw-bold mb-2">Email Address</label>
                        <input type="text" class="form-control" name="email">
                        @error('email_address')
                            <div class="invalid-feedback" style="display:block;">
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-5">
                        <label for="form-label" class="fw-bold mb-2">Phone Number</label>
                        <input type="number" name="phone_number" class="form-control">
                    </div>

                    <div class="col-sm-12 mb-5">
                        <label for="form-label" class="fw-bold mb-2">Profile Picture</label>
                        <input type="file" class="form-control" id="logo" name="logo"
                            onchange="loadPreview(this);">
                        @if ($errors->has('logo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                        @endif
                        <img id="preview_img" src="{{ asset('assets/media/avatars/blank.png') }}" class="mt-2"
                            width="100" height="100" />
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
@push('scripts')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
