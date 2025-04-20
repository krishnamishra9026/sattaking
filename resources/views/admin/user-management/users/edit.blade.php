@extends('layouts.admin')
@section('content')
<div class="title mb-4">
    <h1 class="fs-2">Edit User</h1>
</div>
<div class="card">
    <div class="card-body">
        <form id="RoleForm" method="POST" action="{{ route('admin.user-management.users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="Enter Full Name"
                        value="{{ old('firstname') }}">
                    @error('firstname')
                        <span id="firstname-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="name" name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Enter Full Name"
                        value="{{ old('lastname') }}">
                    @error('lastname')
                        <span id="lastname-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                        value="{{ old('password') }}">
                    <span id="name-error" class="error">Enter only to change Password</span>
                </div>
                <div class="form-group col-sm-12">
                    <div class="d-flex justify-content-between mb-2 mt-2">
                        <label for="role" class="form-label">Permissions</label>
                        <div class="button-group text-end">
                            <span class="btn btn-info btn-sm waves-effect waves-light select-all">Select All</span>
                            <span class="btn btn-dark btn-sm waves-effect waves-light deselect-all">Deselect All</span>
                        </div>
                    </div>
                    <select class="select2 form-control select2-multiple" data-control="select2" id="role" name="roles[]" multiple="multiple">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ in_array($role->name, old('role', [])) || (isset($user) && $user->roles->pluck('name')->contains($role->name)) ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6" style="display: none;">
                    <label for="is_active">Status</label>
                    <select class="form-control" id="is_active" name="is_active" value="{{ old('is_active', $user->is_active) }}">
                        @if ($user->is_active == 1)
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                        @else
                        <option value="0" selected>Inactive</option>
                        <option value="1">Active</option>
                        @endif
                    </select>
                    @error('is_active')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
        <div class="text-end mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark me-1">Back</a>
            <button type="submit" class="btn btn-sm btn-primary" form="RoleForm">Update</button>
        </div>
    </div>

</div>
@endsection
