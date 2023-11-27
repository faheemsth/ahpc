<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" class="profile-wid-img" alt="">
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
                        <img src="<?php if($user->avatar != ''): ?> <?php echo e(URL::asset($user->avatar)); ?><?php else: ?><?php echo e(URL::asset('build/images/users/inst.png')); ?> <?php endif; ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                                  
                    </div>
                    <h5 class="fs-17 mb-1"><?php echo e($user->first_name); ?></h5>
                    <p class="text-muted mb-0"><?php echo e($user->institute_type); ?></p>
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
                        
                    </div>
                </div>
                <div class="progress animated-progress custom-progress progress-label">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo e($user->inst_prf_completion); ?>%" aria-valuenow="<?php echo e($user->inst_prf_completion); ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="label"><?php echo e($user->inst_prf_completion); ?>%</div>
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
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($invoice->invoice_type > 0): ?>
                                <div class="swiper-slide">
                                    <div class="card pt-2 border-0 item-box text-center">
                                        <div class="timeline-content p-3 rounded">
                                            <div>
                                                <?php
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
                                                ?>
                                                <a href="javascript:void(0);" class="<?php echo e($status); ?>"><?php echo e($status_name); ?></a>
                                                <h6 class="fs-15 mb-0"><?php echo e($invoice->description); ?></h6>
                                            </div>
                                        </div>
                                        <div class="time"><span class="badge bg-success"><?php echo e(\Carbon\Carbon::parse($invoice->created_at)->format('j F Y')); ?></span></div>
                                    </div>
                                </div>
                                <?php if($invoice->invoice_type == 2 || $invoice->invoice_type == 3 ): ?>
                                <?php if($invoice->status == 1): ?>
                                <div class="swiper-slide">
                                    <div class="card pt-2 border-0 item-box text-center">
                                        <div class="timeline-content p-3 rounded">
                                            <div>
                                                <a href="javascript:void(0);" class="badge bg-success-subtle text-success">Approved</a>
                                                <h6 class="fs-15 mb-0">License</h6>
                                            </div>
                                        </div>
                                        <div class="time"><span class="badge bg-success"><?php echo e(\Carbon\Carbon::parse($invoice->created_at)->format('j F Y')); ?></span></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <form action="<?php echo e(url('update_overseas_profile_admin/'.$user->id.'')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Name of AHP</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->first_name); ?>" name="name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Father's Name</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->father_name); ?>" name="father_name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>CNIC</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->cnic_no); ?>" placeholder="xxxxx-xxxxxxx-x" name="cnic">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" value="" name="date_of_birth">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="me-3 mb-3">Gender</label><br>
                                        <input class="form-check-input" type="radio" value="male" name="gender" <?= $user->gender == 'male' ? 'checked' : '' ?>>
                                        <label class="form-check-label">Male</label>
                                        <input class="form-check-input ms-3" type="radio" value="female" name="gender" <?= $user->gender == 'female' ? 'checked' : '' ?>>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                                <!--end col-->
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact No</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->contact); ?>" placeholder="+92 xxx xxxxxxx" name="contact_no">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">NICOP</label>
                                        <input type="text" class="form-control" value="" name="nicop">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="<?php echo e($user->email); ?>" name="email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Postal Address</label>
                                        <textarea type="text" class="form-control" name="address"><?php echo e($user->postel_address); ?></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Name of the country / place abroad applying for</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->country); ?>" name="country">
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
                        <form action="<?php echo e(url('update_overseas_password_admin')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row g-2">
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">New
                                            Password*</label>
                                        <input type="password" class="form-control" name="password" id="newpasswordInput" placeholder="Enter new password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div>
                                        <label for="confirmpasswordInput" class="form-label">Confirm
                                            Password*</label>
                                        <input type="password" name="confirm_password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>">
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot
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
                    </div>
                    <!--end tab-pane-->

                    <!--end tab-pane-->
                    <div class="tab-pane" id="documents" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                    
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
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $doc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $status = 0;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-20">
                                                                        <i class="ri-attachment-line"></i>

                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0)"><?php echo e($doc_type->type); ?></a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if(isset($doc_type->overseasDocuments)): ?>
                                                            <?php $__currentLoopData = $doc_type->overseasDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $status = $doc->status;
                                                                    $description = $doc->description != NULL ? $doc->description : '---';
                                                                ?>
                                                                <a download href="<?php echo e(asset('storage/overseas_documents/'.$user->id)); ?>/<?php echo e($doc->file); ?>" style="width:50px;height:50px" class="document_img">
                                                                    <i class="ri-download-line image_download_icon"></i>
                                                                    <?php if(File::exists(public_path('storage/overseas_documents/' . $user->id . '/' . $doc->file))): ?>
                                                                    <img style="width:50px;height:50px" src="<?php echo e(asset('storage/overseas_documents/'.$user->id)); ?>/<?php echo e($doc->file); ?>">
                                                                    <?php endif; ?>
                                                                </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            ---
                                                        <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($status == 1): ?>
                                                            <a href="javascript:void(0);" class="badge bg-success-subtle text-success">Approved</a>
                                                            <?php elseif($status == 2): ?>
                                                            <a href="javascript:void(0);" class="badge bg-danger-subtle text-danger">Rejected</a>
                                                            <?php else: ?>
                                                            <a href="javascript:void(0);" class="badge bg-warning-subtle text-warning">Pending</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer" onClick="updateDoc(<?php echo e($doc_type->id); ?>,`<?php echo e($doc_type->title); ?>`)" class="link-success fs-20" tooltip="Add File"><i class="ri-edit-box-line"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>

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
            <form class="tablelist-form" id="update_doc_form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo e(route('update_overseas_document')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="description" class="form-label">Status</label>
                                <select type="file" id="doc_status" name="doc_status" class="form-control" placeholder="Add description">
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea type="file" id="doc_desc" name="doc_desc" class="form-control" placeholder="Add description"></textarea>
                            </div>
                        </div> -->
                        <input hidden name="type" id="type">
                        <input hidden name="inst" id="inst" value="<?php echo e($user->id); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Save</button>
                        
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
            <form class="tablelist-form" id="update_prg_form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo e(route('update_institute_program')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="description" class="form-label">Status</label>
                                <select type="file" id="prg_status" name="prg_status" class="form-control" placeholder="Add description">
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea type="file" id="prg_desc" name="prg_desc" class="form-control" placeholder="Add description"></textarea>
                            </div>
                        </div>
                        <input hidden name="prg_id" id="prg_id">
                        <input hidden name="inst" id="inst" value="<?php echo e($user->id); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Save</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .image_download_icon {
        position: absolute;
        padding: 1px 2px;
        background: black;
        color: white;
        scale: 0.7;
        transform: translate(20px, 20px);
        display: none
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('user-panels.admin-panel.overseas.js.indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/pages/timeline.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/pages/profile-setting.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<script>
    var message = {
        !!json_encode(Session::get('success')) !!
    }
    if (message != null) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 2000,
            showCloseButton: true
        });
    }

    function uploadImage() {
        var action = "<?php echo e(url('profile_avatar_admin')); ?>";
        var method = 'POST';
        let form_data = new FormData();
        let user_id = $('#inst').val();
        var myimg = document.getElementById('profile-img-file-input').files[0];
        console.log(myimg);
        form_data.append('file', myimg)
        form_data.append('user_id', user_id)
        $.ajax({
            type: method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
        function() {
            $(this).find('.image_download_icon').show()
        },
        function() {
            $(this).find('.image_download_icon').hide()
        }
    )
    // $(document).ready(alert())
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/admin-panel/overseas/profile.blade.php ENDPATH**/ ?>