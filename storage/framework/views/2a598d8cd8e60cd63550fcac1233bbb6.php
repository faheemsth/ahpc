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
</style>

<?php $__env->startSection('content'); ?>

<!-- logo -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <h3>FOR QUALIFIED OVERSEAS AHPs</h3>
        </div>
    </div>
</div>
<!-- logo end -->

<!-- prograss bar -->

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-md-1 text-center">
            <a href="#" class="link-dark previous" id="previous1" id="previous2" id="previous3"><i class="fa fa-light fa-arrow-left fa-2x"></i></a>
        </div>
        <div class=" col-8 col-md-10">
            <div class="progress">
                <div class="progress-bar active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background-color: #00DB69"></div>
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
        <div class="panel panel-primary" style="
            border: 1px solid #dee2e6;
    border-radius: 2rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    margin: 20px 0;">
            <form class="form-horizontal" action="<?php echo e(route('overseass.store')); ?>" id="multistep_form" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <fieldset id="account">
                    <div class="panel-body mt-5" style="
                        margin: 20px;
    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
    border-radius: 30px;
    padding: 24px;">
                        <h3 class="text-center fs-3" id="text-color"><strong>Basic Info</strong></h3><br>
                        <div class="container">
                            <div class="form-a institutions">
                                <div class="form-group">
                                    <div class="row col-md-12 justify-content-center">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Title of Degree / Diploma/ Certificate</label>
                                            <input type="text" class="form-control" value="" name="title">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row col-md-12 justify-content-center">
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label">Duration</label>
                                            <input type="number" class="form-control" value="" name="duration">
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label">Registration No</label>
                                            <input type="number" class="form-control" value="" name="registration_no">
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label">Date of Issuance</label>
                                            <input type="date" class="form-control" value="" name="issue_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12 justify-content-center">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Upload Image (Passport Size)</label>
                                            <input type="file" class="form-control"  name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12 justify-content-center">
                                        <div class="mb-3 col-md-6">
                                            <label class="me-3 mb-3">First Time Registration</label><br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_first_registration">
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="radio" name="is_first_registration">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12 justify-content-center">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Expiry date of last Registration (if applicable)</label>
                                            <input type="date" class="form-control" value="" name="last_registration_expiry">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row col-3 col-md-2 m-auto mb-5">
                                        <input type="button" style="background-color:#009245; color: #FFF;" class="next btn mt-5" value="Next" id="next1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset id="personal">
                    <div class="panel-body mt-5" style="
                        margin: 20px;
    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
    border-radius: 30px;
    padding: 24px;">
                        <h2 class="text-center fs-1" id="text-color"><strong>Fee Details</strong></h2><br>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Fee Deposit Slip No</label>
                                    <select class="form-select">
                                        <?php if(!empty($FeeStructures)): ?>
                                            <?php $__currentLoopData = $FeeStructures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FeeStructure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($FeeStructure->fee); ?>"><?php echo e($FeeStructure->cdd); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Amount (Rs.)</label>
                                    <input type="number" class="form-control" value="" name="fee_deposit_amount">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row col-3 col-md-2 m-auto">
                                <input type="button" style="background-color: #009245; color: #FFF;" class="next btn mt-5" value="Next" id="next2" />
                            </div>
                        </div>
                        
                </fieldset>

                <fieldset id="contact">
                    <div class="panel-body mt-5" style="
                        margin: 20px;
    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
    border-radius: 30px;
    padding: 24px;">
                        <h2 class="text-center fs-1" id="text-color"><strong>Personal Info</strong></h2><br>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-3">
                                    <label>Name of AHP</label>
                                    <input type="text" class="form-control" value="" name="name">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label>Father's Name</label>
                                    <input type="text" class="form-control" value="" name="father_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-3">
                                    <label>CNIC</label>
                                    <input type="text" class="form-control" value="" placeholder="xxxxx-xxxxxxx-x" name="cnic">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" value="" name="date_of_birth">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-3">
                                    <label class="me-3 mb-3">Gender</label><br>
                                    <input class="form-check-input" type="radio" name="gender">
                                    <label class="form-check-label">Male</label>
                                    <input class="form-check-input ms-3" type="radio" name="gender">
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Contact No</label>
                                    <input type="text" class="form-control" value="" placeholder="+92 xxx xxxxxxx" name="contact_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">NICOP</label>
                                    <input type="text" class="form-control" value="" name="nicop">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Postal Address</label>
                                    <textarea type="text" class="form-control" name="address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"> Name of the country / place abroad applying for</label>
                                    <input type="text" class="form-control" value="" name="country">
                                </div>
                            </div>
                        </div>


                        <div class="row col-3 col-md-2 m-auto" style="margin-bottom: 100px !important;">
                            <input type="button" style="background-color: #009245; color: #FFF;" class="next btn mt-5" value="Next" id="next3" />
                        </div>
                    </div>

                </fieldset>
                <fieldset id="personal">
                    <div class="panel-body mt-5" style="
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
                                            <input class="form-check-input mx-0" type="checkbox" name="is_agree">
                                            By signing below, I solemnly declare that the above provided information is true according to best of my knowledge and believe and there is nothing kept hidden from the authority. If any information / act found false / objectionable, at later stage the Council reserves the right to take legal action against me.
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row col-5 col-md-2 m-auto">
                            <input type="submit" class="btn mt-5" style="background-color: #009245; color: #FFF;">
                        </div>
                    </div>
                </fieldset>
        </div>

        </fieldset>
        </form>
    </div>
</div>
</div>



<script src="<?php echo e(asset('build/js/jquery3.7.0.js')); ?>"></script>
<script>
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
            var currentFieldset = $("fieldset:visible");
            var nextFieldset = currentFieldset.next("fieldset");

            if (nextFieldset.length > 0) {
                currentFieldset.hide();
                nextFieldset.show();
                form_count++;
                setProgressBar(form_count);
            }
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
        $(".submit").click(function() {
            // You can add your form submission logic here
            alert("Form submitted!");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.form-select').on('change', function () {
            var selectedValue = $(this).val();
            $('input[name="fee_deposit_amount"]').val(selectedValue);
            $('input[name="fee_deposit_amount"]').prop('readonly', true);
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.sitelayout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/site/overseassignup.blade.php ENDPATH**/ ?>