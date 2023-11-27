@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Good Morning, {{ \Auth::user()->ceo_name }}!</h4>
                                <p class="text-muted mb-0 ">Lastest form Allied health professionals council.
                                </p>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <form action="javascript:void(0);">
                                    <div class="row g-3 mb-0 align-items-center">
                                        <div class="col-sm-auto d-none">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control border-0 fs-13 dash-filter-picker shadow"
                                                    data-provider="flatpickr" data-range-date="true"
                                                    data-date-format="d M, Y"
                                                    data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                <div class="input-group-text bg-secondary border-secondary text-white">
                                                    <i class="ri-calendar-2-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        {{-- <div class="col-auto">
                                        <button type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i>
                                            Add Activity</button>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                    </div> --}}
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    @if (\Auth::user()->role_id != 2)
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                <i class="fa-solid fa-arrow-up-wide-short"></i>
                                                Total Earnings
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            {{-- <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +16.24 %
                                        </h5> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">PKR <span class="counter-value"
                                                    data-target="{{ $total_earnings }}">{{ $total_earnings }}</span>
                                            </h4>
                                            <br>
                                            <a href="" class="text-decoration-underline text-muted d-none">View net
                                                earnings</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="bx bx-dollar-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    @endif
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            <i class="fa-solid fa-people-group"></i>
                                            Overseas AHPs
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        {{-- <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                        -3.57 %
                                    </h5> --}}
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="{{ $total_overseas }}">{{ $total_overseas }}</span></h4>
                                        <br>
                                        <a href="" class="text-decoration-underline text-muted d-none">View all
                                            Overseas AHPs</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                            <i class="fa-solid fa-people-group"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            <i class="fa-solid fa-people-group"></i>
                                            AHPs
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        {{-- <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                        -3.57 %
                                    </h5> --}}
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="{{ $total_ahpcs }}">{{ $total_ahpcs }}</span></h4>
                                        <br>
                                        <a href="" class="text-decoration-underline text-muted d-none">View all
                                            Overseas AHPs</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                            <i class="fa-solid fa-people-group"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            <i class="fa fa-solid fa-building-columns"></i>
                                            Institutions
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">

                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="{{ $approved_inst_count }}">{{ $approved_inst_count }}</span>

                                        </h4>
                                        <!-- <p class="my-0">test</p> -->

                                        <span class="badge badge-primary bg-primary">Pending: {{ $pending_institute }}</span>

                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6 d-none">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                            Students
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">

                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="0">0</span>k
                                        </h4>
                                        <br>
                                        <a href="" class="text-decoration-underline text-muted d-none">See
                                            Details</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Institutions</h4>
                                <div class="flex-shrink-0">

                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <table
                                    class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (\Auth::user()->role_id == 1)
                                            @foreach ($institutes as $institute)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/institute-profile/{{ $institute->id }}"
                                                                        class="text-reset">{{ $institute->first_name }}</a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted">{{ $institute->postel_address }}</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">PKR {{ $institute->amount }}</span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices({{ $institute->id }},`{{ $institute->first_name }}`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                        @if ($institute->inst_approval_status == 1)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $institute->id }},`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        @elseif($institute->inst_approval_status == 2)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $institute->id }},`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @elseif($institute->inst_approval_status == 3)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $institute->id }},`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($institutes as $institute)
                                                @if ($institute->id == \Auth::user()->id)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset">{{ $institute->first_name }}</a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted">{{ $institute->postel_address }}</span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">PKR {{ $institute->amount }}</span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices({{ $institute->id }},`{{ $institute->first_name }}`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
                                                        </td>

                                                    </tr><!-- end -->
                                                @endif
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table><!-- end table -->
                            </div>
                        </div> <!-- .card-->
                    </div>

                    <div class="col-md-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Overseas</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <table id="table-responsive"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (\Auth::user()->role_id == 1)
                                            @foreach ($overseas as $oversea)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/overseas-profile/{{ $oversea->id }}"
                                                                        class="text-reset">{{ $oversea->first_name }}</a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted">{{ $oversea->postel_address }}</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">USD {{ $oversea->amount }}</span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices({{ $oversea->id }},`{{ $oversea->first_name }}`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                                <a style="cursor:pointer" class="link-success fs-20"
                                                                title="Download" href="overseas/invoice/{{ optional($oversea->invoice[0])->id }}">
                                                                <i class="las la-pager"></i>
                                                               </a>
                                                        <!-- @if ($oversea->inst_approval_status == 1)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        @elseif($oversea->inst_approval_status == 2)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @elseif($oversea->inst_approval_status == 3)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @endif -->
                                                    </td>
                                                </tr><!-- end -->
                                            @endforeach
                                        @else
                                            @foreach ($overseas as $oversea)
                                                @if ($overseas->id == \Auth::user()->id)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset">{{ $oversea->first_name }}</a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted">{{ $oversea->postel_address }}</span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">USD {{ $oversea->amount }}</span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices({{ $oversea->id }},`{{ $oversea->first_name }}`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
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
                    </div>

                    <div class="col-md-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">AHPs</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <table id="table-responsive"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (\Auth::user()->role_id == 1)
                                            @foreach ($ahpcs as $oversea)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/overseas-profile/{{ $oversea->id }}"
                                                                        class="text-reset">{{ $oversea->first_name }}</a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted">{{ $oversea->postel_address }}</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">PKR {{ $oversea->amount }}</span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices({{ $oversea->id }},`{{ $oversea->first_name }}`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                        <a style="cursor:pointer" class="link-success fs-20"
                                                         title="Download" href="overseas/invoice/{{ optional($oversea->invoice[0])->id }}">
                                                         <i class="las la-pager"></i>
                                                        </a>



                                                        <!-- @if ($oversea->inst_approval_status == 1)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        @elseif($oversea->inst_approval_status == 2)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @elseif($oversea->inst_approval_status == 3)
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit({{ $oversea->id }},`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        @endif -->
                                                    </td>
                                                </tr><!-- end -->
                                            @endforeach
                                        @else
                                            @foreach ($ahpcs as $oversea)
                                                @if ($ahpcs->id == \Auth::user()->id)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="{{ URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png') }}"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset">{{ $oversea->first_name }}</a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted">{{ $oversea->postel_address }}</span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">PKR {{ $oversea->amount }}</span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices({{ $oversea->id }},`{{ $oversea->first_name }}`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
                                                        </td>

                                                    </tr><!-- end -->
                                                @endif
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table><!-- end table -->

                            </div> <!-- .card-body-->
                        </div> <!-- .card-->
                    </div>

                </div> <!-- end row-->

            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
    <!--  Invoice list Type Modal -->
    <div class="modal fade zoomIn" id="invoices_modal" tabindex="-1" aria-labelledby="invoices_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="invoices_modal_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
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

    <div class="modal fade zoomIn" id="update_inv_modal" tabindex="-1" aria-labelledby="update_inv_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="update_inv_modal_title"> Update Invoice Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
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
                        <button type="button" onclick="submitInvoice()" class="btn btn-success"
                            id="add-btn">Save</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade zoomIn" id="inst_visit_modal" tabindex="-1" aria-labelledby="inst_visit_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title"> Setup <span id="inst_visit_title"> </span> Visit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
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
                        <button type="button" onclick="saveVisit()" class="btn btn-success"
                            id="add-btn">Save</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    @include('user-panels/dashboard/js/indexJs')

    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
