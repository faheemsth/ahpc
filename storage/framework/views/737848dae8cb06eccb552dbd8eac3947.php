<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="row">

    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) ? '' : 'active'); ?>" data-bs-toggle="tab" href="#documentTypes" role="tab">
                            <i class="fas fa-home"></i>
                            Document Types
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#institute" role="tab">
                            <i class="fas fa-home"></i>
                            Institute
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute-type' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#instituteType" role="tab">
                            <i class="fas fa-home"></i>
                            Institute Type
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'overseas-type' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#overseasdocumenttype" role="tab">
                            <i class="fas fa-home"></i>
                            Overseas Document Type
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'discipline-fee' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#discipline" role="tab">
                            <i class="fas fa-home"></i>
                            Discipline Fee
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'policy-category' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#policy_category" role="tab">
                            <i class="fas fa-home"></i>
                            Policy Category
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'home-page' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#Pages" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Dynamic Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'home-blogs' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#blogs" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Blogs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'overseas-fee-structure' ? 'active' : ''); ?>" data-bs-toggle="tab" href="#overseas-fee-structure" role="tab">
                            <i class="las la-pager la-2x"></i>
                            Fee Structure
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">

                    
                    <div class="tab-pane" id="overseas-fee-structure" role="tabpanel">
                        
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $FeeStructures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FeeStructure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($FeeStructure->currency == "USD"): ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td>
                                        <?php echo e(ucfirst($FeeStructure->cdd)); ?>

                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($FeeStructure->fee)); ?> USD
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline" onclick="updateFeeStructure('<?php echo e($FeeStructure->id); ?>','<?php echo e($FeeStructure->cdd); ?>','<?php echo e($FeeStructure->fee); ?>')"><i class="ri-edit-2-line"></i></a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                       
                        <div class="card-header align-items-center d-flex mt-4" style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1">AHPC Fee Structure</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#overseas-fee-structure-modal2">
                                        <i class="ri-file-list-3-line align-middle"></i>AHPC Fee Structure
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $FeeStructures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FeeStructure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($FeeStructure->currency == "PKR"): ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td>
                                        <?php echo e(ucfirst($FeeStructure->cdd)); ?>

                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($FeeStructure->fee)); ?> PKR
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline" onclick="updateFeeStructure2('<?php echo e($FeeStructure->id); ?>','<?php echo e($FeeStructure->cdd); ?>','<?php echo e($FeeStructure->fee); ?>')"><i class="ri-edit-2-line"></i></a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


                    </div>
                    

                    <div class="tab-pane <?php echo e(!empty($_GET['id']) ? '' : 'active'); ?>" id="documentTypes" role="tabpanel">
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    
                                    
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $doc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($doc_type->title); ?></td>
                                    <td>
                                        <?php echo e(ucfirst($doc_type->institute)); ?>

                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($doc_type->institute_type)); ?>

                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                        

                                        
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute' ? 'active' : ''); ?>" id="institute" role="tabpanel">

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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($institute->name); ?></td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-institute" tooltip="Edit Institute" data-id=<?php echo e($institute->id); ?> data-name="<?php echo e($institute->name); ?>"><i class="ri-edit-2-line"></i></a>
                                        <a href="delete_institute?id=<?php echo e($institute->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'institute-type' ? 'active' : ''); ?>" id="instituteType" role="tabpanel">
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $institute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($type->type); ?></td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-institute-type""
                                                    tooltip=" Edit Institute Type" data-id=<?php echo e($type->id); ?> data-name="<?php echo e($type->type); ?>"><i class="ri-edit-2-line"></i></a>
                                        

                                        <a href="/delete_institute_type?id=<?php echo e($type->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'overseas-type' ? 'active' : ''); ?>" id="overseasdocumenttype" role="tabpanel">
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $overseasdocumenttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($type->type); ?></td>
                                    <td><?php echo e($type->fee); ?></td>


                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-overseas-document-type"
                                                    tooltip=" Edit Overseas Document Type" data-id=<?php echo e($type->id); ?> data-name="<?php echo e($type->type); ?>" data-fee="<?php echo e($type->fee); ?>"><i class="ri-edit-2-line"></i></a>

                                        <a href="/delete_overseas_document_type?id=<?php echo e($type->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'discipline-fee' ? 'active' : ''); ?>" id="discipline" role="tabpanel">

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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if($discipline->amount == '' || $discipline->amount == 0 || $discipline->institute == '')
                                continue;
                                ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($discipline->discipline_name); ?></td>
                                    <td><?php echo e($discipline->institute); ?></td>
                                    <td><?php echo e($discipline->institute_type); ?></td>
                                    <td><?php echo e($discipline->amount); ?></td>

                                    <td>
                                        <!-- <a style="cursor:pointer" class="link-success fs-15 edit-discipline""
                                                    tooltip="Edit Discipline" data-id=<?php echo e($discipline->id); ?> data-discipline=<?php echo e($discipline->discipline_name); ?> data-amount=<?php echo e($discipline->amount); ?>><i class="ri-edit-2-line"></i></a> -->
                                        

                                        <a href="/delete_discipline_fee?id=<?php echo e($discipline->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'policy-category' ? 'active' : ''); ?>" id="policy_category" role="tabpanel">

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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($category->category); ?></td>
                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15 edit-policy-category" tooltip="Edit Policy Category" data-id='<?php echo e($category->id); ?>' data-policy='<?php echo e($category->category); ?>'><i class="ri-edit-2-line"></i></a>

                                        <a href="/delete-policy-category?id=<?php echo e($category->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'home-page' ? 'active' : ''); ?>" id="Pages" role="tabpanel">
                        
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-5">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" style="background-color: rgb(241, 241, 241);" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Home Slider
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <form action="<?php echo e(route('dynamic_pages_slider')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
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
                                    <form action="<?php echo e(route('dynamic_pages')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
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
                            
                        </div>

                    </div>

                    <div class="tab-pane <?php echo e(!empty($_GET['id']) && $_GET['id'] == 'home-blogs' ? 'active' : ''); ?>" id="blogs" role="tabpanel">
                        
                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h3 class="card-title mb-0 flex-grow-1">Blogs</h3>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    
                                    
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($blog->title); ?></td>
                                    <td>
                                        <p class="shortDescription"><?php echo e($blog->description); ?></p>
                                        <p class="fullDescription" style="display: none;"><?php echo e($blog->description); ?></p>
                                        <a href="#" class="readMoreLink">Read more</a>

                                    </td>
                                    <td>
                                        <p class="shortDescription"><?php echo e($blog->short_description); ?></p>
                                        <p class="fullDescription" style="display: none;"><?php echo e($blog->short_description); ?></p>
                                        <a href="#" class="readMoreLink">Read more</a>
                                    </td>
                                    <td>
                                        <?php echo e($blog->created_at); ?>

                                    </td>

                                    <td>
                                        
                                        
                                        <a class="btn qualification" onclick="UpdateSubject('<?php echo e($blog->id); ?>', '<?php echo e($blog->description); ?>', '<?php echo e($blog->short_description); ?>', '<?php echo e($blog->feature_image); ?>', '<?php echo e($blog->related_image1); ?>', '<?php echo e($blog->related_image2); ?>','<?php echo e($blog->title); ?>')">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="<?php echo e(url('/delectblog?id='). $blog->id); ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="card-header align-items-center d-flex " style="border-bottom:none !important">
                            <h3 class="card-title mb-0 flex-grow-1">Articles</h3>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    
                                    
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
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $doc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-medium"><?php echo e($count); ?></td>
                                    <td><?php echo e($doc_type->title); ?></td>
                                    <td>
                                        <?php echo e(ucfirst($doc_type->institute)); ?>

                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($doc_type->institute_type)); ?>

                                    </td>
                                    <td>
                                        Link
                                    </td>

                                    <td>
                                        <a style="cursor:pointer" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                        

                                        <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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











































<div class="modal fade zoomIn" id="overseas-fee-structure-modal" tabindex="-1" aria-labelledby="overseas-fee-structure-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="overseas-fee-structure-modal">Overseas Fee Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_fee_structure_form" autocomplete="off" action="<?php echo e(route('save_fee_structure')); ?>">
                <?php echo csrf_field(); ?>
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


<div class="modal fade zoomIn" id="overseas-fee-structure-modal2" tabindex="-1" aria-labelledby="overseas-fee-structure-modal2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="overseas-fee-structure-modal2">AHPC Fee Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_fee_structure_form2" autocomplete="off" action="<?php echo e(route('save_fee_structure')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-lg-12">
                            <div class="form-group">
                                
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
                                
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Degree Holders</label>
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





















































<!-- Save Doc Type Modal -->
<div class="modal fade zoomIn" id="save_doc_type_modal" tabindex="-1" aria-labelledby="save_doc_type_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_doc_type_modal"> Add New Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('save_document_types')); ?>">
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

                                        <?php $__empty_1 = true; $__currentLoopData = $institute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <div class="form-check">
                                            <input class="form-check-input" name="institute_type" value="<?php echo e(strtolower($type->type)); ?>" type="radio">
                                            <label class="form-check-label"><?php echo e($type->type); ?></label>
                                        </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Institutes:</label>
                                        <?php $__empty_1 = true; $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <div class="form-check">
                                            <input class="form-check-input" name="institute" value="<?php echo e(strtolower($institute->name)); ?>" type="radio" checked>
                                            <label class="form-check-label"><?php echo e($institute->name); ?></label>
                                        </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <?php endif; ?>
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('save_overseas_document_type')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('save_institute')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('save_institute_type')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('edit_discipline')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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

                                <?php $__empty_1 = true; $__currentLoopData = $institute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <div class="form-check">
                                    <input class="form-check-input" name="institute_type" value="<?php echo e(strtolower($type->type)); ?>" type="radio" required>
                                    <label class="form-check-label"><?php echo e($type->type); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <?php endif; ?>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Institutes:</label>
                                <?php $__empty_1 = true; $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <div class="form-check">
                                    <input class="form-check-input" name="institute" value="<?php echo e(strtolower($institute->name)); ?>" type="radio" required>
                                    <label class="form-check-label"><?php echo e($institute->name); ?></label>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="update_btn" id="">Update</button>
                        
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('edit_discipline_amount')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div>
                                <label for="">Discipline</label>
                                <select name="discipline_id" id="" class="form form-control">
                                    <option value="">Select Discipline</option>
                                    <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    if(empty($discipline->institute))
                                    continue;
                                    ?>
                                    <option value="<?php echo e($discipline->id); ?>"><?php echo e($discipline->discipline_name.'-'.$discipline->institute_type.'-'.$discipline->institute); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <form class="tablelist-form" id="save_doc_type_form" autocomplete="off" action="<?php echo e(route('add_policy_category')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
            <form class="tablelist-form" method="post" enctype="multipart/form-data" id="save_post_type_form" action="<?php echo e(route('postsh')); ?>">
                <?php echo csrf_field(); ?>
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
                <form class="tablelist-form" method="post"  id="save_artical_type_form" action="<?php echo e(route('artical')); ?>">
                    <?php echo csrf_field(); ?>
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
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $__env->make('user-panels/admin-panel/settings/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(URL::asset('build/js/pages/profile-setting.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/admin-panel/settings/index.blade.php ENDPATH**/ ?>