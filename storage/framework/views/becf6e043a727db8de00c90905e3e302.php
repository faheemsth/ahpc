
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Good Morning, <?php echo e(\Auth::user()->ceo_name); ?>!</h4>
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
                    <?php if(\Auth::user()->role_id != 2): ?>
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
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">PKR <span class="counter-value"
                                                    data-target="<?php echo e($total_earnings); ?>"><?php echo e($total_earnings); ?></span>
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
                    <?php endif; ?>
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
                                        
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="<?php echo e($total_overseas); ?>"><?php echo e($total_overseas); ?></span></h4>
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
                                        
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="<?php echo e($total_ahpcs); ?>"><?php echo e($total_ahpcs); ?></span></h4>
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
                                                data-target="<?php echo e($approved_inst_count); ?>"><?php echo e($approved_inst_count); ?></span>

                                        </h4>
                                        <!-- <p class="my-0">test</p> -->

                                        <span class="badge badge-primary bg-primary">Pending: <?php echo e($pending_institute); ?></span>

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
                                        <?php if(\Auth::user()->role_id == 1): ?>
                                            <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/institute-profile/<?php echo e($institute->id); ?>"
                                                                        class="text-reset"><?php echo e($institute->first_name); ?></a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted"><?php echo e($institute->postel_address); ?></span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">PKR <?php echo e($institute->amount); ?></span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices(<?php echo e($institute->id); ?>,`<?php echo e($institute->first_name); ?>`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                        <?php if($institute->inst_approval_status == 1): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($institute->id); ?>,`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        <?php elseif($institute->inst_approval_status == 2): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($institute->id); ?>,`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php elseif($institute->inst_approval_status == 3): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($institute->id); ?>,`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($institute->id == \Auth::user()->id): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset"><?php echo e($institute->first_name); ?></a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted"><?php echo e($institute->postel_address); ?></span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">PKR <?php echo e($institute->amount); ?></span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices(<?php echo e($institute->id); ?>,`<?php echo e($institute->first_name); ?>`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
                                                        </td>

                                                    </tr><!-- end -->
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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
                                        <?php if(\Auth::user()->role_id == 1): ?>
                                            <?php $__currentLoopData = $overseas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/overseas-profile/<?php echo e($oversea->id); ?>"
                                                                        class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">USD <?php echo e($oversea->amount); ?></span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                                <a style="cursor:pointer" class="link-success fs-20"
                                                                title="Download" href="overseas/invoice/<?php echo e(optional($oversea->invoice[0])->id); ?>">
                                                                <i class="las la-pager"></i>
                                                               </a>
                                                        <!-- <?php if($oversea->inst_approval_status == 1): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        <?php elseif($oversea->inst_approval_status == 2): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php elseif($oversea->inst_approval_status == 3): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php endif; ?> -->
                                                    </td>
                                                </tr><!-- end -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $overseas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($overseas->id == \Auth::user()->id): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">USD <?php echo e($oversea->amount); ?></span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
                                                            <a style="cursor:pointer" class="link-success fs-20"
                                                                    title="Download" href="overseas/invoice/<?php echo e(optional($oversea->invoice[0])->id); ?>">
                                                                    <i class="las la-pager"></i>
                                                                   </a>
                                                        </td>

                                                    </tr><!-- end -->
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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
                                        <?php if(\Auth::user()->role_id == 1): ?>
                                            <?php $__currentLoopData = $ahpcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                    alt="" class="avatar-sm p-2" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1 fw-medium"><a
                                                                        href="/overseas-profile/<?php echo e($oversea->id); ?>"
                                                                        class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="text-muted">PKR <?php echo e($oversea->amount); ?></span>
                                                    </td>
                                                    <td>
                                                        <a style="cursor:pointer"
                                                            onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)"
                                                            class="link-success fs-20" title="Invoices"><i
                                                                class="ri-bill-fill"></i></a>
                                                        <a style="cursor:pointer" class="link-success fs-20"
                                                         title="Download" href="overseas/invoice/<?php echo e(optional($oversea->invoice[0])->id); ?>">
                                                         <i class="las la-pager"></i>
                                                        </a>



                                                        <!-- <?php if($oversea->inst_approval_status == 1): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Zero`,1)"
                                                                class="link-success fs-20" title="Setup Zero Visit"><i
                                                                    class="ri-creative-commons-zero-fill"></i></a>
                                                        <?php elseif($oversea->inst_approval_status == 2): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Accreditation`,2)"
                                                                class="link-success fs-20"
                                                                title="Setup Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php elseif($oversea->inst_approval_status == 3): ?>
                                                            <a style="cursor:pointer"
                                                                onclick="setupVisit(<?php echo e($oversea->id); ?>,`Re-Accreditation`,3)"
                                                                class="link-success fs-20"
                                                                title="Setup Re-Accreditation Visit"><i
                                                                    class="ri-award-fill"></i></a>
                                                        <?php endif; ?> -->
                                                    </td>
                                                </tr><!-- end -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $ahpcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ahpcs->id == \Auth::user()->id): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="/institute_profile"
                                                                            class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                                                    </h5>
                                                                    <span
                                                                        class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-muted">PKR <?php echo e($oversea->amount); ?></span>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)"
                                                                class="link-success fs-20" title="Invoices"><i
                                                                    class="ri-bill-fill"></i></a>
                                                        </td>

                                                    </tr><!-- end -->
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

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
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="box-shadow: none !important;">
                                
                                <!-- end card header -->

                                <div class="card-body">
                                    

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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('user-panels/dashboard/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/index.blade.php ENDPATH**/ ?>