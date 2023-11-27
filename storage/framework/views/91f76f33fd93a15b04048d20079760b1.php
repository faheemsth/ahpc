<style>

.down-border {
            border: 2px solid green;
            width: 60px;
            margin: auto;
        }


        .down-card-1 {

            width: 400px;
            height: 130px;

            box-shadow: 4px 5px 8px rgb(154, 233, 154);
            text-decoration: none;
            color: #038c3f;
            margin: 30px;

        }



        @media(max-width:550px) {
            .download-body {
                display: flex;
                flex-direction: column;


                align-items: center;
            }



            .down-card-1 {
                width: 300px;
            }

        }
        @media(min-width:551px ) and (max-width:768px){
            .download-body {
                display: flex;
                flex-direction: column;


                align-items: center;
            }
            .down-card-1 {
                width: 500px;
            }
        }

</style>
<?php $__env->startSection('content'); ?>

<div class="container  py-5">
    <div class="download-head text-center py-5">
        <h1 class="down-headind mt-4 fw-bold "
            style="font-size: 3rem; font-family: sans-serif; color: rgb(30, 186, 61);">DOWNLOADS</h1>
        <div class="down-border "></div>
    </div>
    <!-- download-cards -->

    <div class="download-body d-flex justify-content-evenly my-4">
        <div class="down-cards-body">
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Notification for the nomination of President
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Notification for the nomination of Vice
                        President AHPC
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Office Order for the nomination of Secretary
                        AHPC
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Allied Health Professionals Council Act 2022
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
        </div>
        <!-- second-card section -->
        <div class="down-cards-body">
            <div class="card down-card-1">
                <div class="card-body ">

                    <p class=" down-text  " style="font-size: 16px;">Office Order (Attachment of the Employees at
                        AHPC)AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body py-2  ">

                    <p class=" down-text   " style="font-size: 15px;"> Order for the nomination of
                        officers from ministry of NHSR&C regarding Look after work for AHCP</p>
                    <a href="#" class="btn btn-outline-success mb-2 ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Notification for AHPC members
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
            <div class="card down-card-1">
                <div class="card-body  ">

                    <p class=" down-text  " style="font-size: 16px;">Notification for New member AHPC
                        AHPC</p>
                    <a href="#" class="btn btn-outline-success ">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.sitelayout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/site/download.blade.php ENDPATH**/ ?>