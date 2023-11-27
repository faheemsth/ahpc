@extends('layouts.master')
@section('title')
@lang('translation.settings')
@endsection
@section('content')


<div class="row">

    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) ? '' : 'active' }}" data-bs-toggle="tab" href="#documentTypes" role="tab">
                            <i class="fas fa-home"></i>
                            Document Types
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) && $_GET['id'] == 'institute' ? 'active' : '' }}" data-bs-toggle="tab" href="#institute" role="tab">
                            <i class="fas fa-home"></i>
                            Institute
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) && $_GET['id'] == 'institute-type' ? 'active' : '' }}" data-bs-toggle="tab" href="#instituteType" role="tab">
                            <i class="fas fa-home"></i>
                            Institute Type
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) && $_GET['id'] == 'overseas-type' ? 'active' : '' }}" data-bs-toggle="tab" href="#overseasdocumenttype" role="tab">
                            <i class="fas fa-home"></i>
                            Overseas Document Type
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) && $_GET['id'] == 'discipline-fee' ? 'active' : '' }}" data-bs-toggle="tab" href="#discipline" role="tab">
                            <i class="fas fa-home"></i>
                            Discipline Fee
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ !empty($_GET['id']) && $_GET['id'] == 'policy-category' ? 'active' : '' }}" data-bs-toggle="tab" href="#policy_category" role="tab">
                            <i class="fas fa-home"></i>
                            Policy Category
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center {{ !empty($_GET['id']) && $_GET['id'] == 'home-page' ? 'active' : '' }}" data-bs-toggle="tab" href="#Pages" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Dynamic Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center {{ !empty($_GET['id']) && $_GET['id'] == 'home-blogs' ? 'active' : '' }}" data-bs-toggle="tab" href="#blogs" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Blogs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center {{ !empty($_GET['id']) && $_GET['id'] == 'overseas-fee-structure' ? 'active' : '' }}" data-bs-toggle="tab" href="#overseas-fee-structure" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Fee Structure
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">

                    {{--  --}}
                    <div class="tab-pane" id="overseas-fee-structure" role="tabpanel">
                        {{-- Overseas Fee Structure --}}
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1">Overseas Fee Structure</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#overseas-fee-structure-modal">
                                        <i class="ri-file-list-3-line align-middle"></i>Overseas Fee Structure
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Certificate Diploma Degree</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($FeeStructures as $FeeStructure)
                                @if ($FeeStructure->currency == "USD")
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>
                                        {{ ucfirst($FeeStructure->cdd) }}
                                    </td>
                                    <td>
                                        {{ ucfirst($FeeStructure->fee) }} USD
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline" onclick="updateFeeStructure('{{ $FeeStructure->id }}','{{ $FeeStructure->cdd }}','{{ $FeeStructure->fee }}')"><i class="ri-edit-2-line"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                       {{-- Ahpc Fee Structure --}}
                        <div class="card-header align-items-center d-flex mt-4" style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1">AHPs Fee Structure</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#overseas-fee-structure-modal2">
                                        <i class="ri-file-list-3-line align-middle"></i>AHPs Fee Structure
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Certificate Diploma Degree</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($FeeStructures as $FeeStructure)
                                @if ($FeeStructure->currency == "PKR")
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>
                                        {{ ucfirst($FeeStructure->cdd) }}
                                    </td>
                                    <td>
                                        {{ ucfirst($FeeStructure->fee) }} PKR
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline" onclick="updateFeeStructure2('{{ $FeeStructure->id }}','{{ $FeeStructure->cdd }}','{{ $FeeStructure->fee }}')"><i class="ri-edit-2-line"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                    {{--  --}}

                    <div class="tab-pane {{ !empty($_GET['id']) ? '' : 'active' }}" id="documentTypes" role="tabpanel">
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    {{-- <label for="striped-rows-showcode" class="form-label text-muted">Show Code</label> --}}
                                    {{-- <input class="form-check-input code-switcher" type="checkbox" id="striped-rows-showcode"> --}}
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_doc_type_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Document Types
                                    </button>
                                </div>
                            </div>
                        </div>

                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Institute</th>
                                    <th>Institute Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($doc_types as $doc_type)
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $doc_type->title }}</td>
                                    <td>
                                        {{ ucfirst($doc_type->institute) }}
                                    </td>
                                    <td>
                                        {{ ucfirst($doc_type->institute_type) }}
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                        {{-- <a style="cursor:pointer" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a> --}}

                                        {{-- <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a> --}}
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'institute' ? 'active' : '' }}" id="institute" role="tabpanel">

                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_institute_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Institute
                                    </button>
                                </div>
                            </div>
                        </div>


                        <table id="example" class="table data-table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($institutes as $institute)
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $institute->name }}</td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-institute" tooltip="Edit Institute" data-id={{$institute->id}} data-name="{{$institute->name}}"><i class="ri-edit-2-line"></i></a>
                                        <a href="delete_institute?id={{$institute->id}}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'institute-type' ? 'active' : '' }}" id="instituteType" role="tabpanel">
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_institute_type_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Institute Type
                                    </button>
                                </div>
                            </div>
                        </div>


                        <table id="example" class="table data-table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($institute_types as $type)
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $type->type }}</td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-institute-type""
                                                    tooltip=" Edit Institute Type" data-id={{$type->id}} data-name="{{$type->type}}"><i class="ri-edit-2-line"></i></a>
                                        {{-- <a style="cursor:pointer" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a> --}}

                                        <a href="/delete_institute_type?id={{$type->id}}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'overseas-type' ? 'active' : '' }}" id="overseasdocumenttype" role="tabpanel">
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_overseas_document_type_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Overseas Document Type
                                    </button>
                                </div>
                            </div>
                        </div>


                        <table id="example" class="table data-table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($overseasdocumenttypes as $type)
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $type->type }}</td>
                                    <td>{{ $type->fee }}</td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-overseas-document-type"
                                                    tooltip=" Edit Overseas Document Type" data-id={{$type->id}} data-name="{{$type->type}}" data-fee="{{$type->fee}}"><i class="ri-edit-2-line"></i></a>

                                        <a href="/delete_overseas_document_type?id={{$type->id}}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'discipline-fee' ? 'active' : '' }}" id="discipline" role="tabpanel">

                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_discipline_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Discipline Payment
                                    </button>
                                </div>
                            </div>
                        </div>


                        <table id="example" class="table data-table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Discipline</th>
                                    <th>Institute</th>
                                    <th>Institute Type</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($disciplines as $discipline)
                                @php
                                if($discipline->amount == '' || $discipline->amount == 0 || $discipline->institute == '')
                                continue;
                                @endphp
                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $discipline->discipline_name }}</td>
                                    <td>{{ $discipline->institute }}</td>
                                    <td>{{ $discipline->institute_type }}</td>
                                    <td>{{ $discipline->amount }}</td>

                                    <td>
                                        <!-- <a style="cursor:pointer" class="link-success fs-15 edit-discipline""
                                                    tooltip="Edit Discipline" data-id={{$discipline->id}} data-discipline={{$discipline->discipline_name}} data-amount={{$discipline->amount;}}><i class="ri-edit-2-line"></i></a> -->
                                        {{-- <a style="cursor:pointer" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a> --}}

                                        <a href="/delete_discipline_fee?id={{$discipline->id}}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'policy-category' ? 'active' : '' }}" id="policy_category" role="tabpanel">

                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_policy_category_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Policy Category
                                    </button>
                                </div>
                            </div>
                        </div>


                        <table id="example" class="table data-table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($categories as $category)

                                <tr>
                                    <td class="fw-medium">{{ $count }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-policy-category" tooltip="Edit Policy Category" data-id='{{$category->id}}' data-policy='{{$category->category}}'><i class="ri-edit-2-line"></i></a>

                                        <a href="/delete-policy-category?id={{$category->id}}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'home-page' ? 'active' : '' }}" id="Pages" role="tabpanel">
                        {{-- <form action="javascript:void(0);">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" class="form-control" id="oldpasswordInput"
                                                placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" class="form-control" id="newpasswordInput"
                                                placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" class="form-control" id="confirmpasswordInput"
                                                placeholder="Confirm password">
                                        </div>
                                    </div>
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
                            </div> --}}
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-5">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" style="background-color: rgb(241, 241, 241);" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Home Slider
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <form action="{{ route('dynamic_pages_slider') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="accordion-body">
                                            <div class="col-lg-6 mb-2">
                                                <div>
                                                    <label for="orderId" class="form-label">Slider 1</label>
                                                    <input type="file" name="slider_image1" class="form-control" placeholder="Slider" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div>
                                                    <label for="orderId" class="form-label">Slider 2</label>
                                                    <input type="file" name="slider_image2" class="form-control" placeholder="Slider" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div>
                                                    <label for="orderId" class="form-label">Slider 3</label>
                                                    <input type="file" name="slider_image3" class="form-control" placeholder="Slider" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 my-2">
                                                <div>
                                                    <button type="submit" class="btn btn-success px-4 py-2">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="accordion-item mb-5">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" style="background-color: rgb(241, 241, 241);" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Contact Information
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                    <form action="{{ route('dynamic_pages') }}" method="post">
                                        @csrf
                                        <div class="accordion-body">
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for="orderId" class="form-label">Address</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Address" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for="orderId" class="form-label">email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="email" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label for="orderId" class="form-label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 my-2">
                                                <div>
                                                    <button type="submit" class="btn btn-success px-4 py-2">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="accordion-item mb-5">
                                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                      Accordion Item #3
                                    </button>
                                  </h2>
                                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                  </div>
                                </div> --}}
                        </div>

                    </div>

                    <div class="tab-pane {{ !empty($_GET['id']) && $_GET['id'] == 'home-blogs' ? 'active' : '' }}" id="blogs" role="tabpanel">
                        {{-- <form>
                                <div id="newlink">
                                    <div id="1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobTitle" class="form-label">Job
                                                        Title</label>
                                                    <input type="text" class="form-control" id="jobTitle"
                                                        placeholder="Job title" value="Lead Designer / Developer">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company
                                                        Name</label>
                                                    <input type="text" class="form-control" id="companyName"
                                                        placeholder="Company name" value="STH">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="experienceYear" class="form-label">Experience
                                                        Years</label>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices
                                                                data-choices-search-false name="experienceYear"
                                                                id="experienceYear">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17" selected>2017
                                                                </option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20">2020</option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            to
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices
                                                                data-choices-search-false name="choices-single-default2">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17">2017</option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20" selected>2020
                                                                </option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobDescription" class="form-label">Job
                                                        Description</label>
                                                    <textarea class="form-control" id="jobDescription" rows="3"
                                                        placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="hstack gap-2 justify-content-end">
                                                <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="newForm" style="display: none;">

                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="javascript:new_link()" class="btn btn-primary">Add
                                            New</a>
                                    </div>
                                </div>
                                <!--end col-->
                            </form> --}}
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h3 class="card-title mb-0 flex-grow-1">Blogs</h3>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    {{-- <label for="striped-rows-showcode" class="form-label text-muted">Show Code</label> --}}
                                    {{-- <input class="form-check-input code-switcher" type="checkbox" id="striped-rows-showcode"> --}}
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_post_type_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Post
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Short Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($blogs as $blog)
                                <style>
                                    .shortDescription {
                                        display: block;
                                        width: 100px;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        text-overflow: ellipsis;
                                    }
                                </style>
                                <tr>
                                    <td class="fw-medium">{{$count}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <p class="shortDescription">{{ $blog->description }}</p>
                                        <p class="fullDescription" style="display: none;">{{ $blog->description }}</p>
                                        <a href="#" class="readMoreLink">Read more</a>

                                    </td>
                                    <td>
                                        <p class="shortDescription">{{ $blog->short_description }}</p>
                                        <p class="fullDescription" style="display: none;">{{ $blog->short_description }}</p>
                                        <a href="#" class="readMoreLink">Read more</a>
                                    </td>
                                    <td>
                                        {{$blog->created_at}}
                                    </td>

                                    <td>
                                        {{-- <a style="cursor:pointer"
                        onclick="updateBlog({{ $blog->id }},'',{{ $blog->description }},''{{ $blog->short_description }},'',{{ $blog->feature_image }},'',{{ $blog->related_image1 }},'',{{ $blog->related_image2 }})",
                                        href="javascript:void(0);" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a> --}}
                                        {{-- <a style="cursor:pointer" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a> --}}
                                        <a class="btn qualification" onclick="UpdateSubject('{{ $blog->id }}', '{{ $blog->description }}', '{{ $blog->short_description }}', '{{ $blog->feature_image }}', '{{ $blog->related_image1 }}', '{{ $blog->related_image2 }}','{{ $blog->title }}')">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/delectblog?id='). $blog->id }}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h3 class="card-title mb-0 flex-grow-1">Articles</h3>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    {{-- <label for="striped-rows-showcode" class="form-label text-muted">Show Code</label> --}}
                                    {{-- <input class="form-check-input code-switcher" type="checkbox" id="striped-rows-showcode"> --}}
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_artical_type_modal">
                                        <i class="ri-file-list-3-line align-middle"></i> Add Article
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Button Text</th>
                                    <th>Button link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($doc_types as $doc_type)
                                <tr>
                                    <td class="fw-medium">{{$count}}</td>
                                    <td>{{$doc_type->title}}</td>
                                    <td>
                                        {{ucfirst($doc_type->institute)}}
                                    </td>
                                    <td>
                                        {{ucfirst($doc_type->institute_type)}}
                                    </td>
                                    <td>
                                        Link
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                        {{-- <a style="cursor:pointer" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a> --}}

                                        <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!--end tab-pane-->
                    <!--end tab-pane-->
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!--end col-->
</div>

<!--end row-->










































{{-- overseas-fee-structure  Start --}}
<div class="modal fade zoomIn" id="overseas-fee-structure-modal" tabindex="-1" aria-labelledby="overseas-fee-structure-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="overseas-fee-structure-modal">Overseas Fee Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_fee_structure_form" autocomplete="off" action="{{ route('save_fee_structure') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Certificate Diploma Degree</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="1 Year" type="radio">
                                            <label class="form-check-label">1 Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="3 Year" type="radio">
                                            <label class="form-check-label">3 Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="5 Year" type="radio">
                                            <label class="form-check-label">5 Year</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="edit" value="">
                                    <input type="hidden" name="currency" value="USD">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Fee</label>
                                <input type="text" id="fee" name="fee" class="form-control" placeholder="Title" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add_btn" id="add-btn">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal AHPC 2 --}}
<div class="modal fade zoomIn" id="overseas-fee-structure-modal2" tabindex="-1" aria-labelledby="overseas-fee-structure-modal2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="overseas-fee-structure-modal2">AHPC Fee Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_fee_structure_form2" autocomplete="off" action="{{ route('save_fee_structure') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-lg-12">
                            <div class="form-group">
                                {{-- Cretifacate Holder --}}
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Certificate Holders</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Certificate Holders One Year" type="radio">
                                            <label class="form-check-label">One Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Certificate Holders Two Year" type="radio">
                                            <label class="form-check-label">Two Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Certificate Holders Five Year" type="radio">
                                            <label class="form-check-label">Five Year</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Diploma Holder --}}
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Diploma Holders</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Diploma Holders One Year" type="radio">
                                            <label class="form-check-label">One Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Diploma Holders Two Year" type="radio">
                                            <label class="form-check-label">Two Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Diploma Holders Five Year" type="radio">
                                            <label class="form-check-label">Five Year</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Degree Holders --}}
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Degree Holders</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Degree Holders One Year" type="radio">
                                            <label class="form-check-label">One Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Degree Holders Two Year" type="radio">
                                            <label class="form-check-label">Two Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Degree Holders Five Year" type="radio">
                                            <label class="form-check-label">Five Year</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Post Doc --}}
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Post Doc</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Post Doc One Year" type="radio">
                                            <label class="form-check-label">One Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Post Doc Two Year" type="radio">
                                            <label class="form-check-label">Two Year</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="cdd" name="cdd" value="Post Doc Five Year" type="radio">
                                            <label class="form-check-label">Five Year</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="edit" value="">
                                    <input type="hidden" name="currency" value="PKR">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Fee</label>
                                <input type="text" id="fee2" name="fee" class="form-control" placeholder="Title" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




















































{{-- overseas-fee-structure  end --}}
<!-- Save Doc Type Modal -->
<div class="modal fade zoomIn" id="save_doc_type_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_doc_type_modal"> Add New Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('save_document_types') }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Document Title</label>
                                <input type="text" id="doc_name" class="form-control" placeholder="Title" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Type of Institute:</label>

                                        @forelse ($institute_types as $type)

                                        <div class="form-check">
                                            <input class="form-check-input" name="institute_type" value="{{strtolower($type->type) }}" type="radio">
                                            <label class="form-check-label">{{$type->type}}</label>
                                        </div>

                                        @empty

                                        @endforelse
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Institutes:</label>
                                        @forelse ($institutes as $institute)

                                        <div class="form-check">
                                            <input class="form-check-input" name="institute" value="{{ strtolower($institute->name) }}" type="radio" checked>
                                            <label class="form-check-label">{{$institute->name}}</label>
                                        </div>

                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
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

<div class="modal fade zoomIn" id="save_overseas_document_type_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_doc_type_modal"> Add New Overseas Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('save_overseas_document_type') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Name</label>
                                <input type="text" id="overseas-document-type-name" name="name" class="form-control" placeholder="Title" required />
                                <input type="hidden" name="id" value="" id="overseas-document-type-id">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Fee</label>
                                <input type="text" id="overseas-document-type-fee" name="fee" class="form-control" placeholder="Fee" required />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add_btn" id="overseas-document-type-add-btn">Add</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade zoomIn" id="save_institute_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_doc_type_modal"> Add New Institute</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('save_institute') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Title" required />
                                <input type="hidden" name="id" value="" id="institute_id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add_btn" id="institute-add-btn">Add</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="save_institute_type_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_doc_type_modal"> Add New Institute Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('save_institute_type') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Type</label>
                                <input type="text" id="type" class="form-control" name="type" placeholder="Type" required />
                                <input type="hidden" name="id" value="" id="institute_type_id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add_btn" id="institute-type-add-btn">Add</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="edit_dsicipline_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="discipline-model-head"> Edit Discipline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('edit_discipline') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>

                                <input type="hidden" name="id" value="" id="discipline_id">

                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="number" class="" name="amount" value="" id="discipline_amount" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Type of Institute:</label>

                                @forelse ($institute_types as $type)

                                <div class="form-check">
                                    <input class="form-check-input" name="institute_type" value="{{strtolower($type->type) }}" type="radio" required>
                                    <label class="form-check-label">{{$type->type}}</label>
                                </div>
                                @empty

                                @endforelse
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Institutes:</label>
                                @forelse ($institutes as $institute)

                                <div class="form-check">
                                    <input class="form-check-input" name="institute" value="{{ strtolower($institute->name) }}" type="radio" required>
                                    <label class="form-check-label">{{$institute->name}}</label>
                                </div>

                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="update_btn" id="">Update</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="save_discipline_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="discipline-model-head"> Add Discipline Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('edit_discipline_amount') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div>
                                <label for="">Discipline</label>
                                <select name="discipline_id" id="" class="form form-control">
                                    <option value="">Select Discipline</option>
                                    @foreach($disciplines as $key => $discipline)
                                    @php
                                    if(empty($discipline->institute))
                                    continue;
                                    @endphp
                                    <option value="{{ $discipline->id }}">{{$discipline->discipline_name.'-'.$discipline->institute_type.'-'.$discipline->institute}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" name="amount" value="" class="form form-control">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="update_btn" id="">Update</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="save_policy_category_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="policy-category-model-head"> Add Policy Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('add_policy_category') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Category</label>
                                <input type="text" name="category" value="" class="form form-control policy_category">
                                <input type="hidden" class="category_id" name="category_id" value="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success add-policy-btn" name="add_btn" id="">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="save_post_type_modal" tabindex="-1" aria-labelledby="save_post_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_post_type_modal"> Add New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" method="post" enctype="multipart/form-data" id="save_post_type_form" action="{{ route('postsh') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Feature Image</label>
                                <input type="file" name="feature_image" class="form-control" placeholder="Feature Image" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Post Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Blog Title" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="">
                                <label for="description" class="form-label">Post Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter your description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="shortdescription" class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" id="shortdescription" placeholder="Enter your Short description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Related Image</label>
                                <input type="file" name="related_image1" class="form-control" placeholder="Related Image" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Related Image</label>
                                <input type="file" name="related_image2" class="form-control" placeholder="Related Image" required />
                            </div>
                        </div>

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

<div class="modal fade zoomIn" id="save_artical_type_modal" tabindex="-1" aria-labelledby="save_artical_type_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="save_artical_type_modal"> Add New Artical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" method="post"  id="save_artical_type_form" action="{{ route('artical') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-lg-12">
                                <div>
                                    <label for="orderId" class="form-label">Artical Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Blog Title" required/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="">
                                    <label for="description"
                                        class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter your description"
                                        rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label for="orderId" class="form-label">Button Text</label>
                                    <input type="text" name="button_text" class="form-control" placeholder="Related" required/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="orderId" class="form-label">Button Link</label>
                                    <input type="text" name="button_link" class="form-control" placeholder="Related" required/>
                                </div>
                            </div>


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
@include('user-panels/admin-panel/settings/js/indexJs')

<script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2();
        let table = new DataTable('.data-table');





        $(".edit-institute").on("click", function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $("#institute_id").val(id);
            $("#name").val(name);

            $("#institute-add-btn").attr("name", "update_btn");

            $("#institute-add-btn").text("Update");

            $("#save_institute_modal").modal("show");
        })

        $(".edit-institute-type").on("click", function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $("#institute_type_id").val(id);
            $("#type").val(name);

            $("#institute-type-add-btn").attr("name", "update_btn");

            $("#institute-type-add-btn").text("Update");

            $("#save_institute_type_modal").modal("show");
        });

        $(".edit-overseas-document-type").on("click", function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var fee = $(this).data('fee');

            $("#overseas-document-type-id").val(id);
            $("#overseas-document-type-name").val(name);
            $("#overseas-document-type-fee").val(fee);

            $("#overseas-document-type-add-btn").attr("name", "update_btn");

            $("#overseas-document-type-add-btn").text("Update");

            $("#save_overseas_document_type_modal").modal("show");
        })


        $(".edit-discipline").on("click", function() {
            var id = $(this).data('id');
            var discipline = $(this).data('discipline');
            var amount = $(this).data('amount');


            $("#discipline_id").val(id);
            $("#discipline-model-head").text('Edit ' + discipline);
            $("#amount").val(amount);
            $("#edit_dsicipline_modal").modal('show');

        })


        $(".edit-policy-category").on("click", function() {
            var id = $(this).data('id');
            var policy = $(this).data('policy');
            alert(id);

            $(".category_id").val(id);
            $("#policy-category-model-head").text('Edit Policy Category');
            $(".policy_category").val(policy);
            $(".add-policy-btn").text('Update');
            $(".add-policy-btn").removeAttr('name');
            $(".add-policy-btn").attr('name', 'update_btn');
            $("#save_policy_category_modal").modal('show');
        })



    });
</script>
@endsection
