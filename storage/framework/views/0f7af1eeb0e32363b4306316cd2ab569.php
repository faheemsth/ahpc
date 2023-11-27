<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

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
    <?php endif; ?>
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" alt="" class="profile-wid-img" />
        </div>
    </div>

    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="<?php if(\Auth::user()->avatar != ''): ?> <?php echo e(URL::asset(\Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('build/images/users/inst.png')); ?> <?php endif; ?>"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1"><?php echo e(\Auth::user()->first_name); ?></h3>
                    <p class="text-white text-opacity-75"><?php echo e(ucfirst(\Auth::user()->institute_type)); ?></p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><?php echo e(\Auth::user()->postel_address); ?>

                        </div>
                        
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

                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="<?php echo e(url('institute_profile_edit')); ?>" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Profile</a>

                    </div>
                    <?php if(!empty(App\Models\OverseasDocument::where('user_id', Auth::id())->where('status', 1)->get())): ?>
                        <div class="flex-shrink-0 px-1">
                            <a style="cursor:pointer" class="btn btn-success" title="Download"
                                href="overseas/invoice/<?php echo e(optional(Auth::user()->invoice[0])->id); ?>">
                                <i class="las la-pager"></i> Download Licence
                            </a>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-5">Complete Your Profile</h5>
                                    <div class="progress animated-progress custom-progress progress-label">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: <?php echo e(\Auth::user()->inst_prf_completion); ?>%"
                                            aria-valuenow="<?php echo e(\Auth::user()->inst_prf_completion); ?>" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="label"><?php echo e(\Auth::user()->inst_prf_completion); ?>%</div>
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
                                                                                if ($invoice->status == 0) {
                                                                                    $status = 'badge bg-warning-subtle text-warning';
                                                                                    $status_name = 'Pending';
                                                                                } elseif ($invoice->status == 1) {
                                                                                    $status = 'badge bg-success-subtle text-success';
                                                                                    $status_name = 'Approved';
                                                                                } else {
                                                                                    $status = 'badge bg-danger-subtle text-danger';
                                                                                    $status_name = 'Rejected';
                                                                                }
                                                                            ?>
                                                                            <a href="javascript:void(0);"
                                                                                class="<?php echo e($status); ?>"><?php echo e($status_name); ?></a>
                                                                            <h6 class="fs-15 mb-0">
                                                                                <?php echo e($invoice->description); ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="time"><span
                                                                            class="badge bg-success"><?php echo e(\Carbon\Carbon::parse($invoice->created_at)->format('j F Y')); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if($invoice->invoice_type == 2 || $invoice->invoice_type == 3): ?>
                                                                <?php if($invoice->status == 1): ?>
                                                                    <div class="swiper-slide">
                                                                        <div
                                                                            class="card pt-2 border-0 item-box text-center">
                                                                            <div class="timeline-content p-3 rounded">
                                                                                <div>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="badge bg-success-subtle text-success">Approved</a>
                                                                                    <h6 class="fs-15 mb-0">License</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="time"><span
                                                                                    class="badge bg-success"><?php echo e(\Carbon\Carbon::parse($invoice->created_at)->format('j F Y')); ?></span>
                                                                            </div>
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

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted"><?php echo e(\Auth::user()->first_name); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Mobile :</th>
                                                    <td class="text-muted"><?php echo e(\Auth::user()->contact); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted"><?php echo e(\Auth::user()->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Location :</th>
                                                    <td class="text-muted"><?php echo e(\Auth::user()->postel_address); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Joining Date</th>
                                                    <td class="text-muted">
                                                        <?php echo e(\Carbon\Carbon::parse(\Auth::user()->created_at)->format('j F Y')); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->


                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Disciplines</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                        <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="javascript:void(0);"
                                                class="badge bg-primary-subtle text-primary"><?php echo e($discipline->discipline_name); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                            <!--end card-->
                        </div>
                        <!--end col-->

                        <div class="col-xxl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">About</h5>
                                    <?php echo e(\Auth::user()->description != null ? \Auth::user()->description : '---'); ?>

                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-user-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Designation :</p>
                                                    <h6 class="text-truncate mb-0">
                                                        <?php echo e(ucfirst(\Auth::user()->institute)); ?>/<?php echo e(ucfirst(\Auth::user()->institute_type)); ?>

                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-global-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Website :</p>
                                                    <a href="#"
                                                        class="fw-semibold"><?php echo e(\Auth::user()->website_url); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!-- end card -->
                            <!-- User Timeline-->


                            
                        </div>
                        <!--end col-->
                    </div>

                    <!--end row-->
                </div>
                <div class="tab-pane fade" id="activities" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Activities</h5>
                            <div class="acitivity-timeline">
                                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                    <i class="ri-user-3-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><?php echo e($log->title); ?>

                                                
                                                <p class="text-muted mb-2"><?php echo $log->description; ?></p>
                                                <small
                                                    class="mb-0 text-muted"><?php echo e(\Carbon\Carbon::parse($log->created_at)->format('j F Y')); ?></small>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end tab-pane-->

                <div class="tab-pane fade" id="documents" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                <!-- <div class="flex-shrink-0">
                                            <input class="form-control d-none" type="file" id="formFile">
                                            <label for="formFile" class="btn btn-danger"><i
                                                    class="ri-upload-2-fill me-1 align-bottom"></i> Upload
                                                File</label>
                                        </div> -->
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
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $doc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $status = 0;
                                                        $description = 0;

                                                    ?>
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
                                                                            href="javascript:void(0)"><?php echo e($doc_type->type); ?></a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <?php if(isset($doc_type->overseasDocuments)): ?>
                                                                <?php $__currentLoopData = $doc_type->overseasDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $status = $doc->status;
                                                                    ?>
                                                                    <a download
                                                                        href="<?php echo e(asset('storage/overseas_documents/' . \Auth::user()->id)); ?>/<?php echo e($doc->file); ?>"
                                                                        style="width:50px;height:50px"
                                                                        class="document_img">
                                                                        <i
                                                                            class="ri-download-line image_download_icon"></i>
                                                                        <?php if(File::exists(public_path('storage/overseas_documents/' . \Auth::user()->id . '/' . $doc->file))): ?>
                                                                            <img style="width:50px;height:50px"
                                                                                src="<?php echo e(asset('storage/overseas_documents/' . \Auth::user()->id)); ?>/<?php echo e($doc->file); ?>"
                                                                                alt="Overseas Document Image">
                                                                        <?php endif; ?>

                                                                    </a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?php if($status == 1): ?>
                                                                <a href="javascript:void(0);"
                                                                    class="badge bg-success-subtle text-success">Approved</a>
                                                            <?php elseif($status == 2): ?>
                                                                <a href="javascript:void(0);"
                                                                    class="badge bg-danger-subtle text-danger">Rejected</a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0);"
                                                                    class="badge bg-warning-subtle text-warning">Pending</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($doc_type->fee); ?>

                                                        </td>
                                                        <td>
                                                            <a style="cursor:pointer"
                                                                onClick="addDoc(`<?php echo e($doc_type->type); ?>`)"
                                                                class="link-success fs-20" tooltip="Add File"><i
                                                                    class="ri-file-add-line"></i></a>
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
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
    </div>
    <!--end row-->

    <!-- Save Document Modal -->
    <div class="modal fade zoomIn" id="save_doc_modal" tabindex="-1" aria-labelledby="save_doc_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-info-subtle">
                    <h5 class="modal-title" id="save_doc_modal"> Add New <span id="doc_type"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form" id="save_doc_form" enctype="multipart/form-data" autocomplete="off"
                    method="post" action="<?php echo e(route('save_overseas_document')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="doc_file" class="form-label">Upload File</label>
                                    <input type="file" id="doc_file" name="doc_file" class="form-control"
                                        placeholder="Upload File" required multiple="true" />
                                </div>
                            </div>
                            <input hidden name="type" id="type">
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
    <?php echo $__env->make('user-panels/overseas/js/profileJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/timeline.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/profile.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/overseas/profile.blade.php ENDPATH**/ ?>