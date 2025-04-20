@extends('layouts.admin')
@section('title','Change Password | Admin')
@section('content')
<div class="title mb-4">
    <h1 class="fs-2">Change Password</h1>
</div>

<div class="card">
    <form id="accountForm" method="POST" action="">
        @csrf
        <div class="card-body">
            <div class="mb-5">
                <label for="form-label" class="fw-bold mb-2">Current password *</label>
                <input type="password" class="form-control" name="current_password">
                @error('current_password')
                    <span id="name-error" class="show-error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="form-label" class="fw-bold mb-2">New Password *</label>
                <input type="password" class="form-control" name="new_password">
                @error('new_password')
                    <span id="name-error" class="show-error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="form-label" class="fw-bold mb-2">New Password Confirmation *</label>
                <input type="password" class="form-control" name="new_password_confirmation">
                @error('new_password_confirmation')
                    <span id="name-error" class="show-error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
