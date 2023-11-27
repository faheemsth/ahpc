<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.basic-tables'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
About
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Disciplines
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><?php echo app('translator')->get('Disciplines'); ?></h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_discipline_modal">
                        <i class="ri-file-list-3-line align-middle"></i> Add Discipline
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="filters my-4">
                    <form action="">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institutes</label>
                                    <select name="institute" id="" class="form form-select select2">
                                        <option value="">Select Institute</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <option value="<?php echo e($institute->name); ?>" <?= isset($_GET['institute']) && !empty($_GET['institute'])  && $_GET['institute'] == $institute->name ? 'selected' : '' ?>><?php echo e($institute->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institutes Types</label>
                                    <select name="institute_type" id="" class="form form-select select2">
                                        <option value="">Select Type</option>

                                        <?php $__empty_1 = true; $__currentLoopData = $institute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <option value="<?php echo e($type->type); ?>" <?= isset($_GET['institute_type']) && !empty($_GET['institute_type'])  && $_GET['institute_type'] == $type->type ? 'selected' : '' ?>><?php echo e($type->type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <input type="submit" class="btn btn-primary mt-1" value="Submit" name="submit">
                                <a href="<?php echo e(route('discipline')); ?>" class="btn btn-danger mt-1">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>


                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Title</th>
                            <th>Institute</th>
                            <th>Category</th>
                            <th>Programs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        ?>
                        <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-medium"><?php echo e($count); ?></td>
                            <td><?php echo e($discipline->discipline_name); ?></td>
                            <td><?php echo e($discipline->institute); ?></td>
                            <td><?php echo e($discipline->institute_type); ?></td>
                            <td>
                                <?php if($discipline->programs): ?>
                                <?php $__currentLoopData = $discipline->programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary program-title" data-program-id=<?php echo e($program->id); ?> data-program-title=<?php echo e($program->title); ?>><?php echo e($program->title); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                ---
                                <?php endif; ?>
                            </td>
                            <td>
                                <a style="cursor:pointer" onclick="editDiscipline(`<?php echo e($discipline->id); ?>`,`<?php echo e($discipline->discipline_name); ?>`,`<?php echo e($discipline->amount); ?>`)" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                <a style="cursor:pointer" onclick="addProgram(`<?php echo e($discipline->id); ?>`,`<?php echo e($discipline->discipline_name); ?>`)" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a>

                                
                            </td>
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
</div>
<div class="modal fade zoomIn" id="save_discipline_modal" tabindex="-1" aria-labelledby="save_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_discipline_modal"> Add New Discipline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_discipline_form" autocomplete="off" action="<?php echo e(route('save_discipline')); ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Title</label>
                                <input type="text" id="discipline_name" class="form-control" placeholder="Title" required />
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div>
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" id="amount" class="form-control" placeholder="Amount" required/>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Type of Institute:</label>

                                    <?php $__empty_1 = true; $__currentLoopData = $institute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="form-check">
                                        <input class="form-check-input" id="institute_type" name="institute_type" value="<?php echo e(strtolower($type->type)); ?>" type="radio">
                                        <label class="form-check-label"><?php echo e($type->type); ?></label>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Institutes:</label>
                                    <?php $__empty_1 = true; $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="form-check">
                                        <input class="form-check-input" id="institute" name="institute" value="<?php echo e(strtolower($institute->name)); ?>" type="radio" checked>
                                        <label class="form-check-label"><?php echo e($institute->name); ?></label>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <?php endif; ?>
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

<div class="modal fade zoomIn" id="edit_discipline_modal" tabindex="-1" aria-labelledby="edit_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="edit_discipline_modal"> Edit Discipline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="edit_discipline_form" autocomplete="off" action="<?php echo e(route('update_discipline')); ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="edit_discipline_name" class="form-label">Title</label>
                                <input type="text" id="edit_discipline_name" class="form-control" placeholder="Title" required />
                            </div>
                            <input id="edit_discipline" hidden value="">
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="edit_amount" class="form-label">Amount</label>
                                <input type="number" id="edit_amount" class="form-control" placeholder="Amount" required />
                            </div>
                            <input id="edit_discipline" hidden value="">
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

<div class="modal fade zoomIn" id="show_program_modal" tabindex="-1" aria-labelledby="show_program_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="show_program_modal"> Edit Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <form action="" id="edit-program">

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="show_program_title" class="form-label">Title</label>
                                <input type="text" id="show_program_title" class="form-control" name="program_title" placeholder="Title" required />
                            </div>
                            <input id="show_program_id" hidden value="" name="program_id">
                        </div>

                        <div class="row">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary add-policy">Add Policy</button>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <table class="table border">
                                    <thead>
                                        <th>Policy Category</th>
                                        <th>Policy Name</th>
                                        <th>Operator</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="policy-table">
                                        <tr data-row-id="1">
                                             <td>

                                                <select name="policy_category[1]" id="" class="form form-control">
                                                    <option value="">Select Category</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $policy_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                    <?php endif; ?>
                                                </select>
                                            
                                            </td>
                                            <td><input type="text" class="form form-control" name="policy_names[1]"></td>
                                            <td><input type="text" class="form form-control" name="operators[1]"></td>
                                            <td><input type="text" class="form form-control" name="values[1]"></td>
                                            <td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-btn">Update</button>
                        <button type="button" class="btn btn-danger" id="delete-btn">Delete</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Save program modals -->
<div class="modal fade zoomIn" id="save_program_modal" tabindex="-1" aria-labelledby="save_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_discipline_modal"> Add New Program for <span id="dis_name"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_program_form" autocomplete="off" action="<?php echo e(route('save_program')); ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" required />
                            </div>
                            <input id="p_dis_id" hidden name="discipline_id" value="">
                        </div>
                    </div>

                    <div class="row">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary add-new-policy">Add Policy</button>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <table class="table border">
                                    <thead>
                                        <th>Policy Category</th>
                                        <th>Policy Name</th>
                                        <th>Operator</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="policy-new-table">
                                        <tr data-row-id="1">
                                             <td>

                                                <select name="policy_category[1]" id="" class="form form-control">
                                                    <option value="">Select Category</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $policy_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                    <?php endif; ?>
                                                </select>
                                            
                                            </td>
                                            <td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[1]"></td>
                                            <td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[1]"></td>
                                            <td><input type="text" class="form form-control" placeholder="Number" name="values[1]"></td>
                                            <td><button class="btn btn-sm btn-danger delete-new-policy"><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                    </tbody>
                                </table>
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
<!--end row-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $__env->make('user-panels/admin-panel/disciplines/js/indexJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
    $(document).ready(function() {

        $(".program-title").on("click", function() {
            var program_id = $(this).data('program-id');
            var program_title = $(this).data('program-title');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $("#show_program_title").val(program_title);
            $("#show_program_id").val(program_id);


            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('edit_program_title')); ?>',
                data: {
                    program_id : program_id
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    data = JSON.parse(data);

                    if(data.status == 'success'){
                        console.log(data.html);
                        $("#policy-table").html(data.html);
                    }
                   
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            $("#show_program_modal").modal('show');
        });

        $("#update-btn").on("click", function() {
            var program_id = $('#show_program_id').val();
            var program_title = $("#show_program_title").val();

            formData = $("#edit-program").serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            console.log(formData);


            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('update-program-title')); ?>',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });

                    // $("#show_program_modal").modal('hide');
                    // window.location.href = 'disciplines';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        })


        $("#delete-btn").on("click", function() {
            var program_id = $('#show_program_id').val();


            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('delete-program-title')); ?>',
                data: {
                    program_id: program_id,
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });

                    // $("#show_program_modal").modal('hide');
                    window.location.href = 'disciplines';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        })

        $('.add-policy').on("click", function() {
            var last_row = $("#policy-table tr:last");
            var last_row_id = last_row.data('row-id');
            last_row_id += 1;

            var category = '<td><select name="policy_category['+last_row_id+']" id="" class="form form-control select2"> ';
            category += '<option value="">Select Category</option>';

            <?php foreach($policy_categories as $category): ?>
                category += '<option value="<?= $category->id ?>"><?= $category->category ?></option>';
            <?php endforeach; ?>

            category += '</select></td>';

            var html = ' <tr data-row-id="' + last_row_id + '">' + category +
                '<td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="Number" name="values[' + last_row_id + ']"></td>' +
                '<td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>' +
                '</tr>';

            $("#policy-table").append(html);
            return false;
        });


        $(document).on("click", ".delete-policy", function() {

            var policy_id = $(this).data('policy-id');

            if(policy_id != undefined){

                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('delete_program_policy')); ?>',
                    data: {
                        id: policy_id,
                    },
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            showCloseButton: true
                        });

                        // $("#show_program_modal").modal('hide');
                       // window.location.href = 'd';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });


            }


            $(this).parent().parent().remove();
        })

        $('.add-new-policy').on("click", function() {
            var last_row = $("#policy-table tr:last");
            var last_row_id = last_row.data('row-id');
            last_row_id += 1;

            var category = '<td><select name="policy_category['+last_row_id+']" id="" class="form form-control select2"> ';
            category += '<option value="">Select Category</option>';

            <?php foreach($policy_categories as $category): ?>
                category += '<option value="<?= $category->id ?>"><?= $category->category ?></option>';
            <?php endforeach; ?>

            category += '</select></td>';

            var html = ' <tr data-row-id="' + last_row_id + '">' + category +
                '<td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="Number" name="values[' + last_row_id + ']"></td>' +
                '<td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>' +
                '</tr>';

            $("#policy-new-table").append(html);
            return false;
        });


        $(document).on("click", ".delete-new-policy", function() {

            $(this).parent().parent().remove();
        })


    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/user-panels/admin-panel/disciplines/index.blade.php ENDPATH**/ ?>