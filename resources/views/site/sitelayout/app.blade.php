<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styling -->
    <link rel="stylesheet" href="{{ asset('build/sitecss/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('build/sitecss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('build/sitecss/login.css') }}">
    <link rel="stylesheet" href="{{ asset('build/sitecss/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('build/sitecss/registration.css') }}">
    <link rel="stylesheet" href="{{ asset('build/sitecss/registor.css') }}">
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <!--<link rel="stylesheet" href="assets/css/footer.css">-->
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="{{ asset('build/bootstrap/css/bootstrap.css')}}">
    <!-- font awesom cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

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
    @include('site.sitelayout.sitenavbar')

    @yield('content')

    @include('site.sitelayout.sitefooter')
   </div>

    <script src="assets/js/main.js"></script>
    <!-- bootstrap js  -->
    <script src="{{ asset('build/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- jquery  -->
    <script src="{{ asset('build/js/jquery3.7.0.js') }}"></script>
</body>

</html>
