<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.basic-tables'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
About
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Overseas
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<div class="col-xl-12">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Overseas</h4>
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
                    <?php if(\Auth::user()->role_id == 1): ?>

                    <?php $__currentLoopData = $overseas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute-profile/<?php echo e($oversea->id); ?>" class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                    </h5>
                                    <span class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                </div>
                            </div>
                        </td>

                         <td>
                            <?php if($oversea->inst_approval_status == 1): ?>
                             <span class="badge bg-success badge-success">Approved</span>

                            <?php else: ?>
                            <span class="badge bg-warning badge-warning">Pending</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <span class="text-muted">PKR <?php echo e($oversea->amount); ?></span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                        </td>
                    </tr><!-- end -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php $__currentLoopData = $$overseas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oversea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($$oversea->id == \Auth::user()->id): ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <img src="<?php echo e(URL::asset('build/images/companies/Allama_Iqbal_Open_University_logo.png')); ?>" alt="" class="avatar-sm p-2" />
                                </div>
                                <div>
                                    <h5 class="fs-14 my-1 fw-medium"><a href="/institute_profile" class="text-reset"><?php echo e($oversea->first_name); ?></a>
                                    </h5>
                                    <span class="text-muted"><?php echo e($oversea->postel_address); ?></span>
                                </div>
                            </div>
                        </td>


                        <td>
                            <span class="text-muted">PKR <?php echo e($oversea->amount); ?></span>
                        </td>
                        <td>
                            <a style="cursor:pointer" onclick="viewInvoices(<?php echo e($oversea->id); ?>,`<?php echo e($oversea->first_name); ?>`)" class="link-success fs-20" title="Invoices"><i class="ri-bill-fill"></i></a>
                        </td>

                    </tr><!-- end -->
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endif; ?>

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
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $__env->make('user-panels/admin-panel/disciplines/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user-panels/dashboard/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/admin-panel/overseas/index.blade.php ENDPATH**/ ?>