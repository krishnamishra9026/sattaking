@extends('layouts.admin')
@section('title','General Setting | Admin')
@section('content')
<div class="title mb-4">
    <h1 class="fs-2">General Setting</h1>
</div>

<div class="card">
    <form class="form w-100" action="" method="POST">
        @csrf
        <div class="card-body">
                <div class="mb-5">
                    <label for="form-label" class="fw-bold mb-2">Site title</label>
                    <input type="text" class="form-control" name="site_title" placeholder="Site Title">
                    @error('site_title')
                        <div class="invalid-feedback" style="display:block;">

                        </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="form-label" class="fw-bold mb-2">Meta title</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                    @error('meta_title')
                        <div class="invalid-feedback" style="display:block;">

                        </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="form-label" class="fw-bold mb-2">Meta description</label>
                    <textarea name="meta_description" rows="4" class="form-control" placeholder="Meta Description"></textarea>
                    @error('meta_description')
                        <div class="invalid-feedback" style="display:block;">
                        </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="form-label" class="fw-bold mb-2">Address</label>
                    <input type="number" name="address" class="form-control" placeholder="Enter Address">
                </div>

                <div class="mb-5">
                    <label for="form-label" class="fw-bold mb-2">Site Logo</label>
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
