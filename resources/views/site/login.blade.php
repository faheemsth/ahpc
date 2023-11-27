@extends('site.sitelayout.app')

@section('content')


    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border justify-content-center rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-none d-lg-flex justify-content-center align-items-center flex-column left-box" >
                <div class="featured-image mb-3">
                    <img src="{{ asset('build/images/siteimages/login4.jpg') }}" class="img-fluid " >
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">.</small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box" id="grid1">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-success">
                        <p>Login</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#">Forgot Password?</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <a href="{{ route('root') }}" class="btn btn-lg btn-success w-100 fs-5">Login</a>
                    </div>

                    <div class="row">
                        <small>Don't have account? <a href="{{ route('site.home') }}">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>








    @endsection
