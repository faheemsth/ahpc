
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.basic-tables'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
About
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Users
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Users</h4>
                <!-- <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_discipline_modal">
                            <i class="ri-file-list-3-line align-middle"></i> Add Discipline
                        </button>
                    </div>
                </div> -->
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Phone</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-medium"><?php echo e($count); ?></td>
                            <td><?php echo e($user->first_name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->cnic_no); ?></td>
                            <td><?php echo e($user->contact); ?></td>
                            <td><?php echo e($user->institute); ?></td>
                          
                        </tr>
                        <?php
                        $count++;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $__env->make('user-panels/admin-panel/disciplines/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/user-panels/admin-panel/users/index.blade.php ENDPATH**/ ?>