@extends('layouts.admin')
@section('title', 'Create Role')
@section('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')

<div class="title mb-4">
    <h1 class="fs-2">Create Role</h1>
</div>

<div class="card">
    <div class="card-body">
        <form id="RoleForm" method="POST" action="{{ route('admin.user-management.roles.store') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name"
                    value="{{ old('name') }}">
                @error('name')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mb-2 mt-2">
                    <label for="permission" class="form-label">Permissions</label>
                    <div class="button-group text-end" style="display: block;">
                        <span class="btn btn-info btn-sm waves-effect waves-light select-all">Select All</span>
                        <span class="btn btn-dark btn-sm waves-effect waves-light deselect-all">Deselect All</span>
                    </div>
                </div>

                @error('permission')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <select class="select2 form-control select2-multiple" data-control="select2" id="permission" name="permission[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose permissions ...">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}"
                            {{ in_array($permission->name, old('permission', [])) ||(isset($role) && $role->permissions->contains($permission->name))? 'selected': '' }}>
                            {{ $permission->name }}</option>
                    @endforeach
                </select>

        </form>
        <div class="text-end mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark me-1">Back</a>
            <button type="submit" class="btn btn-sm btn-primary" form="RoleForm">Save</button>
        </div>
    </div>

</div>

@endsection
@push('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
        $(function() {

            $('.select-all').click(function() {
                let $select2 = $('#permission').find('option').prop('selected', 'selected').trigger('change')
            })
            $('.deselect-all').click(function() {
                let $select2 = $('#permission').find('option').prop('selected', '').trigger('change')
            })
        });
    </script>
@endpush
<!--           $('#permission').select2({
                theme: 'bootstrap4'
            }) -->
