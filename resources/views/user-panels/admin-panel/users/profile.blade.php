@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
    @if(Session::has('message'))
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Profile is not complete. kindly complete your profile first to use dashboard.',
            showConfirmButton: false,
            timer: 4000,
            showCloseButton: true
        });
    </script>
    @endif
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>

    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="@if (\Auth::user()->avatar != '') {{ URL::asset(\Auth::user()->avatar) }}@else{{ URL::asset('build/images/users/khan.jpg') }} @endif"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{\Auth::user()->first_name}}</h3>
                    <p class="text-white text-opacity-75">{{ucfirst(\Auth::user()->institute_type)}}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{\Auth::user()->postel_address}}
                            </div>
                        {{-- <div>
                            <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>STH
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-12 col-lg-auto order-last order-lg-0">
                <div class="row text text-white-50 text-center">
                    <div class="col-lg-6 col-4">
                        <div class="p-2">
                            <h4 class="text-white mb-1">0</h4>
                            <p class="fs-14 mb-0">Students</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-4">
                        <div class="p-2">
                            <h4 class="text-white mb-1">0</h4>
                            <p class="fs-14 mb-0">AHPS</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Activities</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{ url('profile_edit') }}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                {{-- <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Complete Your Profile</h5>
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{\Auth::user()->inst_prf_completion}}%"
                                                aria-valuenow="{{\Auth::user()->inst_prf_completion}}" aria-valuemin="0" aria-valuemax="100">
                                                <div class="label">{{\Auth::user()->inst_prf_completion}}%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Name :</th>
                                                        <td class="text-muted">{{\Auth::user()->first_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted">{{\Auth::user()->contact}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">{{\Auth::user()->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">{{\Auth::user()->postel_address}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">{{ \Carbon\Carbon::parse(\Auth::user()->created_at)->format('j F Y') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card"></div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="activities" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Activities</h5>
                                {{-- <div class="acitivity-timeline">
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/users/khan.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Oliver Phillips <span
                                                    class="badge bg-primary-subtle text-primary align-middle">New</span>
                                            </h6>
                                            <p class="text-muted mb-2">We talked about a project on
                                                linkedin.</p>
                                            <small class="mb-0 text-muted">Today</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                            <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                N
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Nancy Martino <span
                                                    class="badge bg-secondary-subtle text-secondary align-middle">In
                                                    Progress</span></h6>
                                            <p class="text-muted mb-2"><i class="ri-file-text-line align-middle ms-2"></i>
                                                Create new project Buildng product</p>
                                            <div class="avatar-group mb-2">
                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Christi">
                                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                        alt="" class="rounded-circle avatar-xs" />
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Frank Hook">
                                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                                        alt="" class="rounded-circle avatar-xs" />
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title=" Ruby">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            R
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="more">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle">
                                                            2+
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <small class="mb-0 text-muted">Yesterday</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Natasha Carey <span
                                                    class="badge bg-success-subtle text-success align-middle">Completed</span>
                                            </h6>
                                            <p class="text-muted mb-2">Adding a new event with
                                                attachments</p>
                                            <div class="row">
                                                <div class="col-xxl-4">
                                                    <div class="row border border-dashed gx-2 p-2 mb-2">
                                                        <div class="col-4">
                                                            <img src="{{ URL::asset('build/images/small/img-2.jpg') }}"
                                                                alt="" class="img-fluid rounded" />
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-4">
                                                            <img src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                                alt="" class="img-fluid rounded" />
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-4">
                                                            <img src="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                                alt="" class="img-fluid rounded" />
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <small class="mb-0 text-muted">25 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Bethany Johnson</h6>
                                            <p class="text-muted mb-2">added a new member to
                                                dashboard</p>
                                            <small class="mb-0 text-muted">19 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Your order is placed <span
                                                    class="badge bg-danger-subtle text-danger align-middle ms-1">Out
                                                    of Delivery</span></h6>
                                            <p class="text-muted mb-2">These customers can rest assured
                                                their order has been placed.</p>
                                            <small class="mb-0 text-muted">16 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Lewis Pratt</h6>
                                            <p class="text-muted mb-2">They all have something to say
                                                beyond the words on the page. They can come across as
                                                casual or neutral, exotic or graphic. </p>
                                            <small class="mb-0 text-muted">22 Oct</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                    <i class="ri-line-chart-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Monthly sales report</h6>
                                            <p class="text-muted mb-2"><span class="text-danger">2 days
                                                    left</span> notification to submit the monthly sales
                                                report. <a href="javascript:void(0);"
                                                    class="link-warning text-decoration-underline">Reports
                                                    Builder</a></p>
                                            <small class="mb-0 text-muted">15 Oct</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">New ticket received <span
                                                    class="badge bg-success-subtle text-success align-middle">Completed</span>
                                            </h6>
                                            <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span>
                                                submitted a
                                                ticket.</p>
                                            <small class="mb-0 text-muted">26 Aug</small>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end tab-pane-->

                    <!--end tab-pane-->

                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

     <!-- Save Document Modal -->
     <div class="modal fade zoomIn" id="save_doc_modal" tabindex="-1" aria-labelledby="save_doc_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="save_doc_modal"> Add New <span id="doc_type"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" id="save_doc_form" enctype="multipart/form-data" autocomplete="off" method="post" action="{{ route('save_institute_document') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="doc_file" class="form-label">Upload File</label>
                                    <input type="file" id="doc_file" name="doc_file" class="form-control" placeholder="Upload File" required/>
                                </div>
                            </div>
                            <input hidden name="type" id="type">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                            {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('user-panels/institute/js/profileJs')

    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
