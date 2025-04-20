@extends('layouts.admin')
@section('content')

<div class="title mb-4">
    <h1 class="fs-2">Job Seekers</h1>
</div>
@include('admin.includes.flash-message')
@include('admin.seeker.filter')
<div class="card mt-8">
    <div class="card-body">
        <div class="table-responsive bg-white">
            <table class="setTable table table-striped gy-5 gs-5">
                <thead class="table-head">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Profile title</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Registered on</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td><a href="#">{{ $user->id }}</a></td>
                        <td>
                            <a href="{{ route('admin.seeker.edit', $user->id) }}" class="d-flex">{{ $user->name }}</a>
                                <i class="ki-duotone ki-verify fs-2 text-success ms-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{-- <i class="ki-outline ki-watch fs-3 text-warning ms-1"></i> --}}
                            </a>
                        </td>
                        <td>{{ $user->info->education ?? '' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->info->phone ?? '' }}</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        <td>{{ $user->status ?? 'Inactive' }}</td>

                        <td class="text-end">

                                    <a href="{{ route('admin.seeker.show', $user->id) }}" class="btn btn-success px-2 py-1"><i class="ki-outline ki-eye fs-5 ms-1"></i></a>
                                    <a href="javascript:void(0);" onclick="confirmEmployerDelete({{$user->id}})" class="btn btn-danger px-2 py-1"><i class="ki-outline ki-trash fs-5 ms-1"></i></a>
                                    <form id='delete-user-form{{$user->id}}' action="{{route('admin.seeker.destroy', $user->id)}}" method='POST'>
                                        <input type='hidden' name='_token' value='{{ csrf_token()}}'>
                                        <input type='hidden' name='_method' value='DELETE'>
                                    </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Jobs Not found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">


    function confirmEmployerDelete(e) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            t.isConfirmed && document.getElementById("delete-user-form" + e).submit()
        })
    }
</script>
<script type="text/javascript">
    function changeStatus(status,id) {
        $.ajax({
            url: "{{ route('admin.job.change-status') }}",
            type: "POST",
            data: {
                status: status,
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
               
                    Swal.fire({
                        icon: 'success',
                        title: 'Status updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
            }
        });
    }
</script>
@endpush
