@extends('layouts.master')
@section('title')
@lang('translation.basic-tables')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
About
@endslot
@slot('title')
Institutes
@endslot
@endcomponent



<div class="col-xl-12">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Institutions</h4>    
        </div><!-- end card header -->

        <div class="card-body">

        <div class="filters my-4">
                    <form action="">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institutes</label>
                                    <select name="institute" id="" class="form form-select select2">
                                       <option value="">Select Institute</option>

                                       @forelse($institutes_c as $institute)
                                            <option value="{{$institute->name}}">{{$institute->name}}</option>
                                        @empty 

                                       @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institute Types</label>
                                    <select name="institute_type" id="" class="form form-select select2">
                                       <option value="">Select Type</option>

                                       @forelse($institute_types as $type)
                                            <option value="{{$type->type}}">{{$type->type}}</option>
                                        @empty 

                                       @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form form-select select2">
                                        <option value="" <?= isset($_GET['status']) && empty($_GET['status']) ? 'selected' : '' ?>>Select Status</option>
                                        <option value="1" <?= isset($_GET['status']) && $_GET['status'] == 0 ? 'selected' : '' ?>>Pending</option>
                                        <option value="1" <?= isset($_GET['status']) && $_GET['status'] == 1 ? 'selected' : '' ?>>Zero</option>
                                        <option value="2" <?= isset($_GET['status']) && $_GET['status'] == 2 ? 'selected' : '' ?>>Accreditation Visit</option>
                                        <option value="3" <?= isset($_GET['status']) && $_GET['status'] == 3 ? 'selected' : '' ?>>Re-Accreditation Visit</option>
                                        <option value="4" <?= isset($_GET['status']) && $_GET['status'] == 4 ? 'selected' : '' ?>>Approved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <input type="submit" class="btn btn-primary mt-1" value="Submit" name="submit">
                                <a href="{{ route('institute') }}" class="btn btn-danger mt-1">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>

            {{-- <div class="table-responsive table-card"> --}}
            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Institute</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Actions</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(\Auth::user()->role_id != 2)

                    @foreach($institutes as $institute)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')}}" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute-profile/{{$institute->id}}" class="text-reset">{{$institute->first_name}}</a>
                                    </h5>
                                    <span class="text-muted">{{$institute->postel_address}}</span>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="text-muted"> {{ ucwords($institute->institute) }}</span>
                        </td>

                        <td>
                            <span class="text-muted"> {{ ucwords($institute->institute_type) }}</span>
                        </td>


                         <td>
                            @if($institute->inst_approval_status == 1)
                             <span class="badge bg-primary badge-primary">Zero Visit</span>
                            @elseif($institute->inst_approval_status == 2)
                            <span class="badge bg-info badge-info">Accreditation Visit</span>
                           @elseif($institute->inst_approval_status == 3)
                            <span class="badge bg-danger badge-danger">Re-Accreditation Visit</span>
                            @elseif($institute->inst_approval_status == 4)
                            <span class="badge bg-success badge-success">Approved</span>
                            @else
                            <span class="badge bg-warning badge-warning">Pending</span>
                            @endif
                        </td> 

                        <td>
                            <span class="text-muted">PKR {{$institute->amount}}</span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices({{$institute->id}},`{{$institute->first_name}}`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                            @if($institute->inst_approval_status == 1)
                            <a style="cursor:pointer" onclick="setupVisit({{$institute->id}},`Zero`,1)" class="link-success fs-20" title="Setup Zero Visit"><i class="ri-creative-commons-zero-fill"></i></a>
                            @elseif($institute->inst_approval_status == 2)
                            <a style="cursor:pointer" onclick="setupVisit({{$institute->id}},`Accreditation`,2)" class="link-success fs-20" title="Setup Accreditation Visit"><i class="ri-award-fill"></i></a>
                            @elseif($institute->inst_approval_status == 3)
                            <a style="cursor:pointer" onclick="setupVisit({{$institute->id}},`Re-Accreditation`,3)" class="link-success fs-20" title="Setup Re-Accreditation Visit"><i class="ri-award-fill"></i></a>
                            @endif
                        </td>
                    </tr><!-- end -->
                    @endforeach
                    @else
                    @foreach($institutes as $institute)
                    @if($institute->id == \Auth::user()->id)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')}}" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute_profile" class="text-reset">{{$institute->first_name}}</a>
                                    </h5>
                                    <span class="text-muted">{{$institute->postel_address}}</span>
                                </div>
                            </div>
                        </td>
                        {{-- <td>
                                                <span class="text-muted">Bags and Wallets</span>
                                            </td> --}}

                        <td>
                            <span class="text-muted">PKR {{$institute->amount}}</span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices({{$institute->id}},`{{$institute->first_name}}`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                        </td>

                    </tr><!-- end -->
                    @endif
                    @endforeach

                    @endif

                </tbody>
            </table><!-- end table -->
            {{-- </div> --}}

            {{-- <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                <div class="col-sm">
                                    <div class="text-muted">
                                        Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                                    </div>
                                </div>
                                <div class="col-sm-auto  mt-3 mt-sm-0">
                                    <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                        <li class="page-item disabled">
                                            <a href="#" class="page-link">←</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li class="page-item active">
                                            <a href="#" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">→</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

        </div> <!-- .card-body-->
    </div> <!-- .card-->
</div> <!-- .col-->


<!--  Invoice list Type Modal -->
<div class="modal fade zoomIn" id="invoices_modal" tabindex="-1" aria-labelledby="invoices_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="invoices_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            {{-- <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="{{ route('save_document_types') }}"> --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card" style="box-shadow: none !important;">
                            {{-- <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Invoices</h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="active-tables-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="active-tables-showcode">
                                        </div>
                                    </div>
                                </div> --}}
                            <!-- end card header -->

                            <div class="card-body">
                                {{-- <p class="text-muted">Use <code>table-active</code> class to highlight a table row or cell.</p> --}}

                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Invoice ID</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Invoice Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- </form> --}}
        </div>
    </div>
</div>
<!--  Invoice update Type Modal -->

<div class="modal fade zoomIn" id="update_inv_modal" tabindex="-1" aria-labelledby="update_inv_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="update_inv_modal_title"> Update Invoice Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-lg-12">
                        <div id="inv_sts_div" style="display:none">
                            <label for="doc_file" class="form-label">Invoice Status</label>
                            <select id="invoice_status" name="invoice_status" class="form-control">
                                <option value="0">Unpaid</option>
                                <option value="1">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label for="doc_file" class="form-label">Description</label>
                            <textarea id="invoice_desc" name="invoice_desc" class="form-control"></textarea>
                        </div>
                    </div>
                    <input hidden name="invoice_id" id="invoice_id">
                    <input hidden name="visit_status" id="visit_status">
                    <input hidden name="inst_id" id="inst_id">
                    <input hidden name="invst_name" id="invst_name">
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="submitInvoice()" class="btn btn-success" id="add-btn">Save</button>
                    {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="inst_visit_modal" tabindex="-1" aria-labelledby="inst_visit_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title"> Setup <span id="inst_visit_title"> </span> Visit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-lg-12">
                        <div>
                            <label for="doc_file" class="form-label">Amount</label>
                            <input type="number" id="visit_amount" name="visit_amount" class="form-control" />
                        </div>
                    </div>
                    <input hidden name="visit_type" id="visit_type">
                    <input hidden name="inst_id" id="inst_id">
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="saveVisit()" class="btn btn-success" id="add-btn">Save</button>
                    {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
@include('user-panels/admin-panel/disciplines/js/indexJs')
@include('user-panels/dashboard/js/indexJs')

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection