@extends('layouts.admin')
@section('title', 'Roles')
@section('content')

<div class="page-title-box mb-4">
    <div class="page-title-right">
        <a href="{{ route('admin.user-management.roles.create') }}"
            class="btn btn-sm btn-success float-end"><i class="mdi mdi-plus"></i> Add New Role</a>
    </div>
    <h1 class="page-title fs-2">Roles</h1>
</div>

<div class="card">
    <div class="card-body">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
            <thead class="table-head">
                <tr>
                    <th class="text-white text-center">Id</th>
                    <th class="text-white">Role</th>
                    <th class="text-white">Permissions</th>
                    <th class="text-white text-end px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td class="text-center">{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                        <span class="badge bg-secondary">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-end px-4">
                        <a href="{{ route('admin.user-management.roles.edit', $role->id) }}" class="btn btn-primary px-2 py-1"><i class="ki-outline ki-pencil fs-5 ms-1"></i></a>
                        <button type="button" onclick="confirmDelete({{$role->id}})" class="btn btn-danger px-2 py-1"><i class="ki-outline ki-trash fs-5 ms-1"></i></button>
                        <form id='delete-form{{$role->id}}' action='{{route('admin.user-management.roles.destroy', $role->id)}}' method='POST'>
                            <input type='hidden' name='_token' value='{{ csrf_token()}}'>
                            <input type='hidden' name='_method' value='DELETE'>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(no){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form'+no).submit();
            }
            })
    };
</script>
@endpush
