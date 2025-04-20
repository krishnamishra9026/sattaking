@extends('layouts.admin')
@section('content')

<div class="page-title-box mb-4">
    <div class="page-title-right">
        <a href="{{ route('admin.user-management.users.create') }}"
            class="btn btn-sm btn-success float-end"><i class="mdi mdi-plus"></i> Add New User</a>
        <a style="display: none;" class="btn btn-sm btn-warning me-1 end-bar-toggle" href="javascript:void(0);"><i
                class="mdi mdi-filter me-1"></i> Filter
        </a>
        <a href="javascript:void(0)" class="btn btn-sm btn-danger float-end me-1" style="display: none"
            id="delete-all"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</a>
    </div>
    <h1 class="page-title fs-2">Users</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead class="table-head">
                         <tr>
                            <th class="text-white text-center">Id</th>
                            <th class="text-white">Name</th>
                            <th class="text-white">Email</th>
                            <th class="text-white">Roles</th>
                            <th class="text-white text-end px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                    @foreach ($user->roles as $role)
                                    <span class="badge bg-info">{{ $role->name }}</span>
                                    @endforeach
                            </td>
                            <td class="text-end px-4">
                                <a href="{{ route('admin.user-management.users.edit', $user->id) }}" class="btn btn-primary px-2 py-1"><i class="ki-outline ki-pencil fs-5 ms-1"></i></a>
                                <button type="button" onclick="confirmDelete({{$user->id}})" class="btn btn-danger px-2 py-1"><i class="ki-outline ki-trash fs-5 ms-1"></i></button>
                                <form id='delete-form{{$user->id}}' action='{{route('admin.user-management.users.destroy', $user->id)}}' method='POST'>
                                    <input type='hidden' name='_token' value='{{ csrf_token()}}'>
                                    <input type='hidden' name='_method' value='DELETE'>
                                </form>
                                <a style="display:none; " href="#" class="btn btn-warning" onclick="userLogin({{ $user->id }});"> Login </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function confirmDelete(e) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete it!"
            }).then(t => {
                t.isConfirmed && document.getElementById("delete-form" + e).submit()
            })
        }
    </script>
@endpush
