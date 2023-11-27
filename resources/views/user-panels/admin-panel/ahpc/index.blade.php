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
Overseas
@endslot
@endcomponent



<div class="col-xl-12">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">AHPs</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(\Auth::user()->role_id == 1)

                    @foreach($overseas as $oversea)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')}}" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute-profile/{{$oversea->id}}" class="text-reset">{{$oversea->first_name}}</a>
                                    </h5>
                                    <span class="text-muted">{{$oversea->postel_address}}</span>
                                </div>
                            </div>
                        </td>

                         <td>
                            @if($oversea->inst_approval_status == 1)
                             <span class="badge bg-success badge-success">Approved</span>

                            @else
                            <span class="badge bg-warning badge-warning">Pending</span>
                            @endif
                        </td>

                        <td>
                            <span class="text-muted">PKR {{$oversea->amount}}</span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices({{$oversea->id}},`{{$oversea->first_name}}`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                            <a style="cursor:pointer" class="link-success fs-20"
                            title="Download" href="overseas/invoice/{{ optional($oversea->invoice[0])->id }}">
                            <i class="las la-pager"></i>
                           </a>
                        </td>
                    </tr><!-- end -->
                    @endforeach
                    @else
                    @foreach($$overseas as $oversea)
                    @if($$oversea->id == \Auth::user()->id)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="{{URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')}}" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute_profile" class="text-reset">{{$oversea->first_name}}</a>
                                    </h5>
                                    <span class="text-muted">{{$oversea->postel_address}}</span>
                                </div>
                            </div>
                        </td>


                        <td>
                            <span class="text-muted">PKR {{$oversea->amount}}</span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices({{$oversea->id}},`{{$oversea->first_name}}`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                            <a style="cursor:pointer" class="link-success fs-20"
                            title="Download" href="overseas/invoice/{{ optional($oversea->invoice[0])->id }}">
                            <i class="las la-pager"></i>
                           </a>
                        </td>

                    </tr><!-- end -->
                    @endif
                    @endforeach

                    @endif

                </tbody>
            </table><!-- end table -->
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
