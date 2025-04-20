@extends('layouts.admin')
@section('content')
<div class="title mb-4">
    <h1 class="fs-2">Create User</h1>
</div>
<div class="card">
    <div class="card-body">
        <form id="RoleForm" method="POST" action="{{ route('admin.user-management.users.store') }}">
            @csrf
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" name="firstname" placeholder="Enter Full Name"
                        value="{{ old('firstname') }}">
                    @error('firstname')
                        <span id="firstname-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="name" name="lastname" placeholder="Enter Full Name"
                        value="{{ old('lastname') }}">
                    @error('lastname')
                        <span id="lastname-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address"
                        value="{{ old('email') }}">
                    @error('email')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                        value="{{ old('password') }}">
                    @error('password')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-12">
                    <div class="d-flex justify-content-between mb-2 mt-2">
                        <label for="role" class="form-label">Roles</label>
                        <div class="button-group text-end">
                            <span class="btn btn-info btn-sm waves-effect waves-light select-all">Select All</span>
                            <span class="btn btn-dark btn-sm waves-effect waves-light deselect-all">Deselect All</span>
                        </div>
                    </div>
                    <select class="select2 form-control select2-multiple" data-control="select2" id="role" name="roles[]" multiple="multiple">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ in_array($role->name, old('roles', [])) ||(isset($user) && $user->roles->contains($role->name))? 'selected': '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
        <div class="text-end mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark me-1">Back</a>
            <button type="submit" class="btn btn-sm btn-primary" form="RoleForm">Save</button>
        </div>
    </div>

</div>
@endsection

