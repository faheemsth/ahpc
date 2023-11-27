<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styling -->
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/registration.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('build/sitecss/registor.css')); ?>">
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <!--<link rel="stylesheet" href="assets/css/footer.css">-->
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="<?php echo e(asset('build/bootstrap/css/bootstrap.css')); ?>">
    <!-- font awesom cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <title>AHPC</title>
    <style>

@media only screen and (max-width: 375px) {
  .your-ahpc{
    flex-direction: column;
  }
}
.form-control:focus{
  border-color: #009245 !important;
  box-shadow: none !important;
}
.form-check-input:focus{
  border-color: #009245 !important;
  box-shadow: none !important;
}
.form-check-input:checked {
  background-color: #009245 !important;
    border-color: #009245 !important;
}
.dropdown-item:active {
    background-color: #009245;
}
    </style>
</head>

<body>
   <div class="app">
    <?php echo $__env->make('site.sitelayout.sitenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('site.sitelayout.sitefooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>

    <script src="assets/js/main.js"></script>
    <!-- bootstrap js  -->
    <script src="<?php echo e(asset('build/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
    <!-- jquery  -->
    <script src="<?php echo e(asset('build/js/jquery3.7.0.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/site/sitelayout/app.blade.php ENDPATH**/ ?>