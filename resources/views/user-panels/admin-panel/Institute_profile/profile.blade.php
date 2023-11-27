@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="@if ($user->avatar != '') {{ URL::asset($user->avatar) }}@else{{ URL::asset('build/images/users/inst.png') }} @endif"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-17 mb-1">{{$user->first_name}}</h5>
                        <p class="text-muted mb-0">{{$user->institute_type}}</p>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Profile Status</h5>
                        </div>
                        <div class="flex-shrink-0">
                            {{-- <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                    class="ri-edit-box-line align-bottom me-1"></i> Edit</a> --}}
                        </div>
                    </div>
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$user->inst_prf_completion}}%" aria-valuenow="{{$user->inst_prf_completion}}"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="label">{{$user->inst_prf_completion}}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div>
                        <h5>Timeline</h5>
                        <div class="horizontal-timeline my-3">
                            <div class="swiper timelineSlider">
                                <div class="swiper-wrapper">
                                    @foreach($invoices as $invoice)
                                    @if($invoice->invoice_type > 0)
                                    <div class="swiper-slide">
                                        <div class="card pt-2 border-0 item-box text-center">
                                            <div class="timeline-content p-3 rounded">
                                                <div>
                                                    @php
                                                    if($invoice->status == 0){
                                                        $status = 'badge bg-warning-subtle text-warning';
                                                        $status_name = 'Pending';
                                                    }else if($invoice->status == 1){
                                                        $status = 'badge bg-success-subtle text-success';
                                                        $status_name = 'Approved';
                                                    }else{
                                                        $status = 'badge bg-danger-subtle text-danger';
                                                        $status_name = 'Rejected';
                                                    }
                                                    @endphp
                                                    <a href="javascript:void(0);" class="{{$status}}">{{$status_name}}</a>
                                                    <h6 class="fs-15 mb-0">{{$invoice->description}}</h6>
                                                </div>
                                            </div>
                                            <div class="time"><span class="badge bg-success">{{ \Carbon\Carbon::parse($invoice->created_at)->format('j F Y') }}</span></div>
                                        </div>
                                    </div>
                                    @if($invoice->invoice_type == 2 || $invoice->invoice_type == 3 )
                                        @if($invoice->status == 1)
                                        <div class="swiper-slide">
                                            <div class="card pt-2 border-0 item-box text-center">
                                                <div class="timeline-content p-3 rounded">
                                                    <div>
                                                        <a href="javascript:void(0);" class="badge bg-success-subtle text-success">Approved</a>
                                                        <h6 class="fs-15 mb-0">License</h6>
                                                    </div>
                                                </div>
                                                <div class="time"><span class="badge bg-success">{{ \Carbon\Carbon::parse($invoice->created_at)->format('j F Y') }}</span></div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <!--end timeline-->
                    </div>
                </div>
                <!--end col-->
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Portfolio</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                    class="ri-add-fill align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                <i class="ri-github-fill"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="gitUsername" placeholder="Username"
                            value="@daveadame">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                <i class="ri-global-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com"
                            value="www..com">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                <i class="ri-dribbble-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" placeholder="Username"
                            value="@dave_adame">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-pinterest-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" placeholder="Username"
                            value="Advance Dave">
                    </div>
                </div>
            </div> --}}
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#programs" role="tab">
                                <i class="far fa-user"></i>
                                Disciplines & Programs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="far fa-envelope"></i>
                                Documents
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ url('update_institute_profile_admin/'.$user->id.'') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">Full
                                                Name</label>
                                            <input type="text" class="form-control" id="first_name"
                                                placeholder="Enter your FullName" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="ceo_name" class="form-label">Name of the Head of Institution/CEO/Owner</label>
                                            <input type="text" class="form-control" name="ceo_name" id="ceo_name"
                                                placeholder="Enter your Name of the Head of Institution/CEO/Owner" value="{{ $user->ceo_name }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="contact" class="form-label">Contact
                                                Number</label>
                                            <input type="text" class="form-control" name="contact" id="contact"
                                                placeholder="Enter your phone number" value="{{ $user->contact }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="student_num" class="form-label">Number of students enrolled*</label>
                                            <input type="number" class="form-control" name="student_num" id="student_num"
                                                placeholder="Number of students" value="{{ $user->student_num }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Date of Establishment*</label>
                                            <input type="date" class="form-control" name="deo" id="deo" value="{{ $user->doe }}"  placeholder="Select date" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="website_url" class="form-label">Website</label>
                                            <input type="text" class="form-control" name="website_url" id="website_url"
                                                placeholder="Website" value="{{ $user->website_url }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Postel Address*</label>
                                           <textarea name="postel_address" class="form-control" id="postel_address" cols="30" rows="5">{{ $user->postel_address }}</textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="tehsil" class="form-label">Tehsil*
                                                </label>
                                            <input type="text" class="form-control" name="tehsil" id="tehsil" placeholder="Tehsil"
                                                value="{{ $user->tehsil }}" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">District*
                                                </label>
                                            <input type="text" class="form-control" name="district" id="district"
                                                placeholder="District" value="{{ $user->district }}" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Province*
                                                </label>
                                            <input type="text" class="form-control"
                                                id="province" name="province" placeholder="Enter Province*" value="{{ $user->province }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnic_no" class="form-label">CNIC*
                                        </label>
                                    <input type="text" class="form-control"
                                        id="cnic_no" name="cnic_no" placeholder="Enter CNIC*" value="{{ $user->cnic_no }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnic" class="form-label">Qualification*
                                        </label>
                                    <input type="text" class="form-control"
                                        id="qualification" name="qualification" placeholder="Enter Qualification*" value="{{ $user->qualification }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="me-1">Gender :<span style="color:red">*</span></label>
                                        <div class="mb-3 col-md-6">
                                            <input class="form-check-input" type="radio" name="gender" value="male" {{ $user->gender =='male'?"checked":'' }}>
                                            <label class="form-check-label">Male</label>
                                            <input class="form-check-input"{{ $user->gender =='female'?"checked":'' }} type="radio" name="gender" value="female">
                                            <label class="form-check-label">Female</label>
                                            <input class="form-check-input" type="radio" {{ $user->gender =='other'?"checked":'' }} name="gender" value="other">
                                            <label class="form-check-label">Others</label>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="description"
                                                class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Enter your description"
                                                rows="3">{{ $user->description }}</textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Updates</button>
                                            <button type="button" class="btn btn-soft-success">Cancel</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="{{ url('update_password_admin') }}" method="post">
                                @csrf
                                <div class="row g-2">
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" class="form-control" name="password" id="newpasswordInput"
                                                placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" name="confirm_password" class="form-control" id="confirmpasswordInput"
                                                placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="javascript:void(0);"
                                                class="link-primary text-decoration-underline">Forgot
                                                Password ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <div class="float-end">
                                    <a href="javascript:void(0);" class="link-primary">All Logout</a>
                                </div>
                                <h5 class="card-title">Login History</h5>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>iPhone 12 Pro</h6>
                                    <p class="text-muted mb-0">Los Angeles, United States - March 16 at
                                        2:47PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-tablet-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Apple iPad Pro</h6>
                                    <p class="text-muted mb-0">Washington, United States - November 06
                                        at 10:43AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Galaxy S21 Ultra 5G</h6>
                                    <p class="text-muted mb-0">Conneticut, United States - June 12 at
                                        3:24PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                        <i class="ri-macbook-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Dell Inspiron 14</h6>
                                    <p class="text-muted mb-0">Phoenix, United States - July 26 at
                                        8:10AM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <!--end tab-pane-->
                        <div class="tab-pane" id="programs" role="tabpanel">

                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Discipline</th>
                                                                <th scope="col">Program</th>
                                                                <th scope="col">Status</th>
                                                               {{--  <th scope="col">Upload Date</th> --}}
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                                @php
                                                                    $chek = '';
                                                                    $status = '';
                                                                    $status_name = '';
                                                                    $readonly = '';

                                                                @endphp
                                                                @foreach($inst_prgs as $inst_prg)
                                                                        @php
                                                                            $chek = 'checked';
                                                                            if($inst_prg->program_status == 0){
                                                                                $status = 'badge bg-warning-subtle text-warning';
                                                                                $status_name = 'Pending';
                                                                                $readonly = 'disabled';
                                                                            }else if($inst_prg->program_status == 1){
                                                                                $status = 'badge bg-success-subtle text-success';
                                                                                $status_name = 'Approved';
                                                                                $readonly = 'disabled';
                                                                            }else{
                                                                                $status = 'badge bg-danger-subtle text-danger';
                                                                                $status_name = 'Rejected';
                                                                                $readonly = 'disabled';
                                                                            }
                                                                        @endphp

                                                            <tr>
                                                                <td>
                                                                    {{$inst_prg->dis_name}}
                                                                </td>
                                                                <td>
                                                                    {{$inst_prg->program_name}}
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="{{$status}}">{{$status_name}}</a>
                                                                </td>
                                                                <td>
                                                                    <a style="cursor:pointer" onClick="updateProgramStatus({{$inst_prg->program_id}},`{{$inst_prg->program_name}}`,`{{$inst_prg->dis_name}}`)" class="link-success fs-20" tooltip="Add File"><i class="ri-edit-box-line"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="text-center mt-3">
                                                    <a href="javascript:void(0);" class="text-success "><i
                                                            class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                                        Load more </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            {{-- </div> --}}
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="documents" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                        {{-- <div class="flex-shrink-0">
                                            <input class="form-control d-none" type="file" id="formFile">
                                            <label for="formFile" class="btn btn-danger"><i
                                                    class="ri-upload-2-fill me-1 align-bottom"></i> Upload
                                                File</label>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Files</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($doc_types as $doc_type)
                                                            @php
                                                                $status = 0;
                                                                $description = '---';
                                                            @endphp
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div
                                                                            class="avatar-title bg-primary-subtle text-primary rounded fs-20">
                                                                            <i class="ri-attachment-line"></i>

                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                                href="javascript:void(0)">{{$doc_type->title}}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if(isset($doc_type->overseasDocuments))
                                                                @foreach($doc_type->overseasDocuments as $doc)
                                                                @php
                                                                $status = $doc->status;
                                                                @endphp
                                                                <a download href="{{ asset('storage/institute_documents/'.$user->id) }}/{{$doc->file}}" style="width:50px;height:50px" class="document_img">
                                                                    <i class="ri-download-line image_download_icon"></i>
                                                                    @if (File::exists(public_path('storage/institute_documents/' . $user->id . '/' . $doc->file)))
                                                                        <img style="width:50px;height:50px" src="{{ asset('storage/institute_documents/'.$user->id) }}/{{$doc->file}}" alt="Document Image">
                                                                    @endif
                                                                </a>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($status == 1)
                                                                <a href="javascript:void(0);" class="badge bg-success-subtle text-success">Approved</a>
                                                                @elseif($status == 2)
                                                                <a href="javascript:void(0);" class="badge bg-danger-subtle text-danger">Rejected</a>
                                                                @else
                                                                <a href="javascript:void(0);" class="badge bg-warning-subtle text-warning">Pending</a>
                                                                @endif
                                                            </td>
                                                            <td>{{$description}}</td>
                                                            <td>
                                                                <a style="cursor:pointer" onClick="updateDoc({{$doc_type->id}},`{{$doc_type->title}}`)" class="link-success fs-20" tooltip="Add File"><i class="ri-edit-box-line"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- <div class="text-center mt-3">
                                                <a href="javascript:void(0);" class="text-success "><i
                                                        class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                                    Load more </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <!-- User Timeline-->

    </div>

    <!--end row-->
    <div class="modal fade zoomIn" id="update_doc_modal" tabindex="-1" aria-labelledby="update_doc_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="update_doc_modal_title"> Update Status of <span id="doc_type"></span> Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" id="update_doc_form" enctype="multipart/form-data" autocomplete="off" method="post" action="{{ route('update_institute_document') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="description" class="form-label">Status</label>
                                    <select type="file" id="doc_status" name="doc_status" class="form-control" placeholder="Add description" >
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="file" id="doc_desc" name="doc_desc" class="form-control" placeholder="Add description" ></textarea>
                                </div>
                            </div>
                            <input hidden name="type" id="type">
                            <input hidden name="inst" id="inst" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Save</button>
                            {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade zoomIn" id="update_prg_modal" tabindex="-1" aria-labelledby="update_prg_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="update_prg_modal_title1"> Update Status of <span id="update_prg_modal_title"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" id="update_prg_form" enctype="multipart/form-data" autocomplete="off" method="post" action="{{ route('update_institute_program') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="description" class="form-label">Status</label>
                                    <select type="file" id="prg_status" name="prg_status" class="form-control" placeholder="Add description" >
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="file" id="prg_desc" name="prg_desc" class="form-control" placeholder="Add description" ></textarea>
                                </div>
                            </div>
                            <input hidden name="prg_id" id="prg_id">
                            <input hidden name="inst" id="inst" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Save</button>
                            {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .image_download_icon{
            position: absolute;
            padding: 1px 2px;
            background: black;
            color: white;
            scale: 0.7;
            transform: translate(20px, 20px);
            display: none
        }
    </style>
@endsection
@section('script')
@include('user-panels.admin-panel.Institute_profile.js.indexJs')
<script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ URL::asset('build/js/pages/timeline.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        var message = {!! json_encode(Session::get('success')) !!}
        if(message != null){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }

        function uploadImage(){
            var action = "{{ url('profile_avatar_admin') }}";
            var method='POST';
            let form_data = new FormData();
            let user_id = $('#inst').val();
            var myimg = document.getElementById('profile-img-file-input').files[0];
            console.log(myimg);
            form_data.append('file',myimg)
            form_data.append('user_id',user_id)
            $.ajax({
                type: method,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                cache: false,
                contentType: false,
                processData: false,
                url: action,
                data: form_data,
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile Image Updated Successfully!',
                            showConfirmButton: false,
                            timer: 2000,
                            showCloseButton: true
                        });
                    }
                }
            });

        }
    </script>
    <script>
        $('.document_img').hover(
            function(){
                $(this).find('.image_download_icon').show()
            },
            function(){
                $(this).find('.image_download_icon').hide()
            }
        )
        // $(document).ready(alert())
    </script>
@endsection
