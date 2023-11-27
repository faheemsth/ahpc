@extends('site.sitelayout.app')
@section('content')


    <!-- logo -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <h3>FOR STUDENTS</h3>
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
                        style="background-color: #00DB69"></div>
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
                <form class="form-horizontal" action="" id="multistep_form">
                    <fieldset id="account">
                        <div class="panel-body mt-5"
                        style="
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
                                                <label class="form-label">Upload Image (Passport Size)</label>
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Title of Degree / Diploma/ Certificate applied for admission</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12 justify-content-center">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Duration</label>
                                                <input type="number" class="form-control">
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

                    <fieldset id="personal">
                        <div class="panel-body mt-5"
                        style="
                        margin: 20px;
    background-image: linear-gradient(to top right, white,white, rgb(187,231,187));
    border-radius: 30px;
    padding: 24px;">
                            <h2 class="text-center fs-1" id="text-color"><strong>Fee Details</strong></h2><br>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Fee Deposit Slip No</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Amount (Rs.)</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row col-3 col-md-2 m-auto">
                                    <input type="button" name="password" style="background-color: #009245; color: #FFF;"
                                        class="next btn mt-5" value="Next" id="next2" />
                                </div>
                            </div>
                            <div class="form-1-bottom d-none d-lg-block">
                                <img src="assets/images/form1 bottom.svg" alt="" width="1150" height="auto">
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
                                    <div class="mb-3 col-md-3">
                                        <label>Name of Student</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label>Father's Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-3">
                                        <label>CNIC</label>
                                        <input type="number" class="form-control" placeholder="xxxxx-xxxxxxx-x">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label>Date of Birth</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-3">
                                        <label class="me-3 mb-3">Gender</label><br>
                                        <input class="form-check-input" type="radio" name="gender">
                                        <label class="form-check-label">Male</label>
                                        <input class="form-check-input" type="radio" name="gender">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Contact No</label>
                                        <input type="number" class="form-control" placeholder="+92 xxx xxxxxxx">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Postal Address</label>
                                        <textarea type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row col-3 col-md-2 m-auto" style="margin-bottom: 100px !important;">
                                <input type="button" style="background-color: #009245; color: #FFF;" name="password"
                                    class="next btn mt-5" value="Next" id="next3" />
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
                            <h2 class="text-center fs-1" id="text-color"><strong>Institution Details</strong></h2><br>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label>Name of institution</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label>Address of institution</label>
                                        <textarea type="number" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-12 justify-content-center">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Student's Institutional ID</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row col-2 col-md-1 m-auto" style="margin-bottom: 100px !important;">
                                <input type="button" style="background-color: #009245; color: #FFF;" name="password"
                                    class="btn mt-5" value="submit" id="submit" />
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/js/jquery3.7.0.js') }}"></script>
    <script>
        $(document).ready(function () {
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
            $(".next").click(function () {
                showNextStep();
            });

            // Handle the "Previous" button click
            $(".previous").click(function () {
                showPreviousStep();
            });

            // Handle the "Submit" button click (you can adjust this as needed)
            $(".submit").click(function () {
                // You can add your form submission logic here
                alert("Form submitted!");
            });
        });
    </script>

@endsection
