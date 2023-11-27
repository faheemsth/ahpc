<style type="text/css">
    #multistep_form fieldset:not(:first-of-type) {
        display: none;
    }

    .text-left-1 {
        text-align: left !important;
    }

    .form-1-bottom {
        top: 507px;
        right: 57px;
    }

    .form-3-bottom {
        top: 310px;
        z-index: -99;
    }

    .form-end-1 {
        right: 130px;
        bottom: 565px;
    }

    .form-end-2 {
        right: 130px;
        bottom: 565px;
    }

    .container {
        position: relative;
        max-width: 320px;
        width: 100%;
        margin: 80px auto 30px;
    }

    .select-btn {
        display: flex;
        height: 50px;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        border-radius: 8px;
        cursor: pointer;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .select-btn .btn-text {
        font-size: 17px;
        font-weight: 400;
        color: #333;
    }

    .select-btn .arrow-dwn {
        display: flex;
        height: 21px;
        width: 21px;
        color: #fff;
        font-size: 14px;
        border-radius: 50%;
        background: rgb(63, 153, 63);
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .select-btn.open .arrow-dwn {
        transform: rotate(-180deg);
    }

    .list-items {
        position: relative;
        margin-top: 15px;
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        max-height: 220px;
        overflow-y: scroll;
        overflow-x: hidden;
        display: none;
    }

    .select-btn.open~.list-items {
        display: block;
    }

    /* Always show the scrollbar of the dropdown */
    .select-btn.open~.list-items::-webkit-scrollbar {
        width: 8px;
        height: 0;
    }

    .select-btn.open~.list-items::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, .2);
        border-radius: 8px;
    }

    .select-btn.open~.list-items::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, .3);
    }

    .list-items .item {
        display: flex;
        align-items: center;
        list-style: none;
        height: 50px;
        cursor: pointer;
        transition: 0.3s;
        padding: 0 15px;
        border-radius: 8px;
    }

    .list-items .item:hover {
        background-color: #e7edfe;
    }

    .item .item-text {
        font-size: 16px;
        font-weight: 400;
        color: #333;
    }

    .item .checkbox {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 16px;
        width: 16px;
        border-radius: 4px;
        margin-right: 12px;
        border: 1.5px solid #c0c0c0;
        transition: all 0.3s ease-in-out;
    }

    .item.checked .checkbox {
        background-color: rgb(63, 153, 63);
        border-color: rgb(63, 153, 63);
    }

    .checkbox .check-icon {
        color: #fff;
        font-size: 11px;
        transform: scale(0);
        transition: all 0.2s ease-in-out;
    }

    .item.checked .check-icon {
        transform: scale(1);
    }
</style>

<?php $__env->startSection('content'); ?>
    <!-- logo -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <h3>FOR INSTITUTIONS</h3>
            </div>
        </div>
    </div>
    <!-- logo end -->

    <!-- prograss bar -->

    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-md-1 text-center">
                <a href="#" class="link-dark previous" id="previous1" id="previous2" id="previous3"><i
                        class="fa fa-light fa-arrow-left fa-2x"></i></a>
            </div>
            <div class=" col-8 col-md-10">
                <div class="progress">
                    <div class="progress-bar active" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                        style="background-color: #25b86c"></div>
                </div>
            </div>
            <div class="col-md-1 text-center">
                <a href="#" class="link-dark"><i class="fa-solid fa-xmark fa-2x"></i></a>
            </div>
        </div>
    </div>

    <!-- End prograss bar -->

    <!-- select type -->

    <div class="container">
        <div class="panel-group">
            <div class="panel panel-primary"
                style="
            border: 1px solid #dee2e6;
    border-radius: 2rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    margin: 20px 0;">
                <form class="form-horizontal" id="institute_signup" novalidate method="POST"
                    action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <fieldset id="account">
                        <div class="panel-body mt-5"
                            style="
                        margin: 20px;
    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
    border-radius: 30px;
    padding: 24px;">
                            <h3 class="text-center fs-3" id="text-color"><strong>Institute Info</strong></h3><br>
                            <div class="container">
                                <div class="form-a institutions">
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Full Name<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="full_name" name="f_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Postel Address<span
                                                        style="color:red">*</span></label>
                                                <textarea type="text" class="form-control" id="postel_address" name="postel_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-2">
                                                <label class="form-label">Tehsil<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="tehsil" name="tehsil">
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label class="form-label">District<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="district" name="district">
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label class="form-label">Province<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="province" name="province">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Number of students enrolled<span
                                                        style="color:red">*</span></label>
                                                <input type="number" class="form-control" id="student_num"
                                                    name="student_num">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Date of Establishment<span
                                                        style="color:red">*</span></label>
                                                <input type="date" class="form-control" id="doe" name="doe">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-6" style="width:25% !important">
                                                <label class="form-label">Type of Institute:</label>

                                                


                                                <?php $__empty_1 = true; $__currentLoopData = $Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="institute_type"
                                                            id="institute-type-v1" value="<?php echo e($type->type); ?>"
                                                            type="radio">
                                                        <label class="form-check-label"><?php echo e($type->type); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3 col-md-6" style="width:25% !important">
                                                <?php $__empty_1 = true; $__currentLoopData = $Institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <label class="form-label"></label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="institute"
                                                            id="institute-v1" value="<?php echo e($institute->name); ?>"
                                                            type="radio">
                                                        <label class="form-check-label"><?php echo e($institute->name); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row col-3 col-md-2 m-auto mb-5">
                                            <input type="button" name="password"
                                                style="background-color:#009245; color: #FFF;" class="next btn mt-5"
                                                value="Next" id="next1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset id="disciplines">
                        <div class="panel-body mt-5"
                            style="
                        margin: 20px;
                                    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
                        border-radius: 30px;
                        padding: 24px;">
                            <h2 class="text-center fs-1" id="text-color"><strong>Select Disciplines</strong></h2><br>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <div class="container">
                                            <div class="select-btn">
                                                <span class="btn-text">Disciplines<span style="color:red">*</span></span>
                                                <span class="arrow-dwn">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </span>
                                            </div>

                                            <ul class="list-items discipline-list-item">
                                                <?php if(!empty($Disciplines)): ?>
                                                    <?php $__currentLoopData = $Disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="item">
                                                            <span class="checkbox">
                                                                <i class="fa-solid fa-check check-icon"></i>
                                                            </span>
                                                            <span class="item-text" data-token="<?php echo e($Discipline->id); ?>"
                                                                data-amt=<?php echo e($Discipline->amount); ?>

                                                                data-text="<?php echo e($Discipline->discipline_name); ?>"><?php echo e($Discipline->discipline_name); ?></span>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control" name="discipline" id="discipline" value="" hidden>
                                <div class="row col-md-12 justify-content-center">
                                    <div class="my-4 col-md-7">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    
                                                    <th scope="col">Disciplines</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="discipline_body">
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <div class="row col-3 col-md-2 m-auto">
                                    <input type="button" name="password" style="background-color: #009245; color: #FFF;"
                                        class="next btn mt-5" value="Next" id="next2" />
                                </div>
                            </div>

                    </fieldset>

                    <fieldset id="contact">
                        <div class="panel-body mt-5"
                            style="
                            margin: 20px;
                            background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
                            border-radius: 30px;
                            padding: 24px;">
                            <h2 class="text-center fs-1" id="text-color"><strong>Personal Info</strong></h2><br>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label>Name of the Head of Institution/CEO/Owner<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="ceo_name" id="ceo_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label class="me-5">Gender :<span style="color:red">*</span></label>
                                        <input class="form-check-input" type="radio" name="gender" value="male"
                                            checked>
                                        <label class="form-check-label me-3">Male</label>
                                        <input class="form-check-input" type="radio" name="gender" value="female">
                                        <label class="form-check-label me-3">Female</label>
                                        <input class="form-check-input" type="radio" name="gender" value="other">
                                        <label class="form-check-label">Others</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">CNIC<span style="color:red">*</span></label>
                                        <input type="number" class="form-control" placeholder="xxxxxxxxxxxxx"
                                            name="cnic_no" id="cnic_no">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Qualification<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="qualification"
                                            id="qualification">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">

                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Website<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="website_url" id="website_url">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Contacts<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="contact" id="contact_name">
                                    </div>
                                </div>
                            </div>


                            <div class="row col-3 col-md-2 m-auto" style="margin-bottom: 100px !important;">
                                <input type="button" style="background-color: #009245; color: #FFF;" name="password"
                                    class="next btn mt-5" value="Next" id="next3" />
                            </div>
                        </div>

                    </fieldset>
                    
                    <fieldset id="sign-up-details">
                        <div class="panel-body mt-5"
                            style="
                            margin: 20px;
                            background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
                            border-radius: 30px;
                            padding: 24px;">
                            <h2 class="text-center fs-1" id="text-color"><strong>Sign-up Details</strong></h2><br>
                            <div class="container">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="col-md-6 text-center">
                                        
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" placeholder="name@example.com"
                                                id="email" name="email">
                                            <label for="floatingInput">Email address<span
                                                    style="color:red">*</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" placeholder="Password"
                                                id="passwprd" name="password">
                                            <label for="floatingPassword">Password<span style="color:red">*</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                id="cpasswd" name="cpasswd">
                                            <label for="cpasswd">Confirm Password<span style="color:red">*</span></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row col-3 col-md-2 m-auto" style="margin-bottom: 100px !important;">
                                <input type="button" style="background-color: #009245; color: #FFF;"
                                    class="next btn mt-5" value="Next" id="next4" />
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset id="personal">
                        <div class="panel-body mt-5"
                            style="
                                margin: 20px;
                                background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
                                border-radius: 30px;
                                padding: 24px;">
                            <h2 class="text-center fs-1" id="text-color"><strong>Declaration</strong></h2><br>
                            <div class="container">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="col-md-6 text-center">
                                        <div class="form-check">

                                            <label class="form-check-label">
                                                <input class="form-check-input mx-0" type="checkbox" name="declaration"
                                                    value="" id="declaration">
                                                By signing below, I solemnly declare that the above provided information is
                                                true according to best of my knowledge and believe and there is nothing kept
                                                hidden from the authority.<span style="color:red">*</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row col-5 col-md-2 m-auto mb-3">
                                <button type="button" onclick="formSubmit()" class="btn mt-5"
                                    style="background-color: #009245; color: #FFF;">Submit</button>
                            </div>
                        </div>
                    </fieldset>


                </form>
            </div>
        </div>
    </div>



    <!-- main js file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    
    <script>
        var check_step = true;
        $(document).ready(function() {
         
            var form_count = 1;
            var total_forms = $("fieldset").length;

            // Hide all fieldsets except the first one
            $("fieldset:not(:first)").hide();

            // Function to set the progress bar
            function setProgressBar(curStep) {
                var percent = (curStep - 1) / (total_forms - 1) * 100;
                $(".progress-bar")
                    .css("width", percent + "%")
                    .html(percent.toFixed(0) + "%");
            }

            // Function to show the next step and hide the current step
            function showNextStep() {
                var valid = validateStep(form_count);

                if (valid) {

                    if (valid == 'failed') {
                        return false;
                    }
                    var currentFieldset = $("fieldset:visible");
                    var nextFieldset = currentFieldset.next("fieldset");

                    if (nextFieldset.length > 0) {
                        currentFieldset.hide();
                        nextFieldset.show();
                        form_count++;
                        setProgressBar(form_count);
                    }
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Please fill in all required fields.',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                }
            }
          

            // Function to validate form fields
            function validateStep(step) {
                var isValid = true;
                // You can add your validation logic here for the fields in the current step
                // Example:
                if (step === 1) {

                    if ($('#full_name').val() === '' || $('#postel_address').val() === '' || $('#postel_address')
                        .val() === '' || $('#district').val() === '' || $('#province').val() === '' || $(
                            '#student_num').val() === '' || $('#doe').val() === '') {
                        isValid = false;
                    }
                    $('#discipline_body').html('');
                    text_array = [];
                    amt_array = [];
                    array = [];
                    check_step = false;

        
                    if ($('#full_name').val() != '') {
                        var full_name = $('#full_name').val();
                        $.ajax({
                            type: 'GET',
                            url: '<?php echo e(route('validate-name')); ?>',
                            data: {
                                full_name: full_name
                            },
                            success: function(data) {
                                data = JSON.parse(data);

                                if (data.status == 'success') {

                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: data.message,
                                        showConfirmButton: false,
                                        timer: 2000,
                                        showCloseButton: true
                                    });

                                    return 'failed';
                                }
                            }
                        })
                    }


                    var myinstitute = $('input[id="institute-v1"]:checked').val();
                    var mytype = $('input[id="institute-type-v1"]:checked').val();
                    
                    $.ajax({
                            type: 'GET',
                            url: '<?php echo e(route('getdiscipline')); ?>',
                            data: {
                                type: mytype,
                                institute: myinstitute
                            },
                            success: function(data) {
                                data = JSON.parse(data);
                              //  console.log(data);
                                $(".discipline-list-item").html('');

                                if (data.status == 'success') {
                                    var html = '';
                                    data.data.forEach(function(item) {
                                        html += '<li class="item">' +
                                            '<span class="checkbox">' +
                                            '<i class="fa-solid fa-check check-icon"></i>' +
                                            '</span>' +
                                            '<span class="item-text" data-token="' + item.id +
                                            '"' +
                                            'data-amt="' + item.amount + '"' +
                                            'data-text="' + item.discipline_name + '">' + item
                                            .discipline_name + '</span>' +
                                            '</li> ';
                                    });

                                    $(".discipline-list-item").html(html);
                                } else {
                                    Swal.fire({
                                        title: 'Not Found!',
                                        text: 'No specific discipline found',
                                        icon: 'error',
                                        confirmButtonClass: 'btn btn-info w-xs mt-2',
                                        buttonsStyling: false
                                    });
                                }
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.log("Error:", errorThrown);
                                // Handle the error here
                            }
                        });

                } else if (step === 2) {
                    if ($('#discipline').val() === '') {
                        isValid = false;
                    }
                } else if (step === 3) {
                    if ($('#ceo_name').val() === '' || $('#cnic_no').val() === '' || $('#qualification').val() ===
                        '' || $('#website_url').val() === '' || $('#contact_name').val() === '') {
                        isValid = false;
                    }
                } else if (step === 4) {
                    if ($('#email').val() === '' || $('#passwprd').val() === '' || $('#cpasswd').val() === '') {
                        isValid = false;
                    }
                }

                return isValid;
            }

            // Function to show the previous step and hide the current step
            function showPreviousStep() {
                var currentFieldset = $("fieldset:visible");
                var previousFieldset = currentFieldset.prev("fieldset");

                if (previousFieldset.length > 0) {
                    currentFieldset.hide();
                    previousFieldset.show();
                    form_count--;
                    setProgressBar(form_count);
                }
            }

            // Handle the "Next" button click
            $(".next").click(function() {
                showNextStep();
            });

            // Handle the "Previous" button click
            $(".previous").click(function() {
                showPreviousStep();
            });

            // Handle the "Submit" button click (you can adjust this as needed)
            // $("#institute_signup").submit(function(event) {

        });

        function formSubmit() {
            // event.preventDefault();
            // You can add your form submission logic here
            if ($('#declaration').is(':checked')) {
                $('#declaration').val(1)
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please fill in all required fields.',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
                return false;
            }
            $("#institute_signup").submit()
        }
    </script>


    <script>
        $(document).ready(function() {
            

            const selectBtn = $(".select-btn");
            const itemsContainer = $(".items-container"); // Change this to the container that holds your items
            var array = [];
            var text_array = [];
            var amt_array = [];

            selectBtn.click(function() {
                selectBtn.toggleClass("open");
            });
           
            console.log(check_step);
            

            $(document).on('click', '.item', function() {
              
               
                $(this).toggleClass("checked");
                let checked = $(".item.checked");
                let btnText = $(".btn-text");

                if ($(this).hasClass("checked")) {
                    array.push($(this).find(".item-text").data('token'));
                    text_array.push($(this).find(".item-text").data('text'));
                    amt_array.push($(this).find(".item-text").data('amt'));
                } else {
                    array = array.filter(item => item !== $(this).find(".item-text").data('token'));
                    let index = text_array.indexOf($(this).find(".item-text").data('text'));

                    text_array = text_array.filter(item => item !== $(this).find(".item-text").data('text'));
                    amt_array.splice(index, 1);
                }


                let tbl_row = '';
                for (let i = 0; i < text_array.length; i++) {
                    let count = i + 1;
                    tbl_row += '<tr><td>' + count + '</td><td>' + text_array[i] + '</td><td>' +
                        amt_array[i] + ' (Rs.)</td></tr>'
                }
                $('#discipline_body').html('');
                $('#discipline_body').html(tbl_row);

                $('#discipline').val(array.join(','));
                if (checked.length > 0) {
                    btnText.text(checked.length + " Selected");
                } else {
                    btnText.text("Select Discipline");
                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.sitelayout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/site/institutionsignup.blade.php ENDPATH**/ ?>