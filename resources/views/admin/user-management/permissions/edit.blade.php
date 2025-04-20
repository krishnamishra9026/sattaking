@extends('layouts.admin')
@section('title', 'Edit Permission')
@section('content')
<div class="title mb-4">
    <h1 class="fs-2">Edit Permission</h1>
</div>
<div class="card">
    <div class="card-body">
        <form id="PermissionForm" method="POST" action="{{ route('admin.user-management.permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-5">
                <label for="name" class="form-label">Permission Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permisison Name"
                    value="{{ old('name', $permission->name) }}">
                @error('name')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </form>
        <div class="text-end">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark me-1">Back</a>
            <button type="submit" class="btn btn-sm btn-primary" form="PermissionForm">Update</button>
        </div>
    </div>

</div>
@endsection
