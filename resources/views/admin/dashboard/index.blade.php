@extends('layouts.admin')
@section('content')

    <div class="title mb-4">
        <h1 class="fs-2">Dashboard</h1>
    </div>
    <div class="row">
 

        @include('admin.includes.flash-message')


        <div class="col-md-3">
            <div class="card ms-4">
                <div class="card-body p-5">
                    <a href="#" style="color: #6c757d">
                        <div class="d-flex">
                            <div class="d-icon me-4">
                                <img src="{{ asset('assets/media/icons/candidate.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="title-body mt-3">
                                <h4 class="fs-3 fw-bolder">{{ $total_seekers }}</h4>
                                <p>Job Seekers</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Table widget 14-->
            <div class="mt-6 card card-flush mb-8">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fs-2 fw-bold text-gray-900">Latest Jobs</span>
                    </h3>
                    <!--end::Title-->
                </div>
            
                <!--end: Card Body-->
            </div>
            <!--end::Table widget 14-->
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
            t.isConfirmed && document.getElementById("delete-employer-form" + e).submit()
        })
    }
</script>

@endpush