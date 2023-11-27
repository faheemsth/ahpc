@extends('site.sitelayout.app')

<style>
    .con-img img {
            width: 380px;
        }
    .con-text .con-heading{
        font-weight: 800;
        font-size: 1.7rem;
    }
    @media (max-width: 768px) {
        .con-img img {
            width: 280px;
        }
    .con-text .con-heading{
        font-weight: 800;
        font-size: 1.2rem;
    }

    }
    @media (max-width: 425px) {
        .con-img img {
            width: 200px;
        }
    .con-text .con-heading{
        font-weight: 800;
        font-size: 1.2rem;
    }
    .con-text p{
        padding:0px 10px;
    }
    }
</style>



@section('content')
<div class="container my-5">
<div class="row py-5 justify-content-center">
    <div class="col-md-10 col-12">
        <div class=" con-img py-4 text-center">
            <img src="{{ asset('build/images/illustrations-webmaintenance.png') }}" height="auto">
        </div>
        <div class="con-text text-center  py-2">
            <h2 class="con-heading text-success fw-bold ">
                Site Under Maintenance
            </h2>
            <p class="px-md-2 px-lg-5">We sincerely apologize for the inconvenience our site is currently undergoing seheduled maintenance and upgrades, but will return shortly</p>
            <p class="fw-bold " >Thank you for your patience.</p>
        </div>
    </div>
</div>
</div>

@endsection
