<style>
    /* #blogsect .sectionblog{
        display: flex;
        justify-content: center;
        align-items: flex-end;
        color: #006837 !important;
    }
    #blogsect .sectionblog a{
        color: white !important;
    } */
    /* Reset Default Settings */


#grade2 {
    background-image: linear-gradient(to left #41b660, #39b54a);
}




#con img {

    clip-path: polygon(0 1%, 100% 1%, 91% 100%, 0% 100%);

    position: relative;
    border-radius: 5px;
}

.dis-card {
    position: absolute;
    top: 16%;
    left: -25%;
    width: 400px;




}

@media (max-width:375px) {
    .dis-card {

        top: -10%;
        left: 10%;
        width: 270px;

    }

}

@media(min-width:376px) and (max-width:767px) {
    .dis-card {

        top: -10%;
        left: 20%;

        width: 280px;




    }
}

@media(min-width:768px) and (max-width:990px) {
    .dis-card {
        position: absolute;
        top: 16%;
        left: -30%;
        width: 270px;

    }

    #con img {
        /* width: 700px; */
        height: 400px;
    }
}

@media(min-width:991px) and (max-width:1200px) {
    .dis-card {

        width: 350px;
    }
}
/* bolg section */
.image_wrapper {
  position: relative;
  margin-bottom: 20px;
}
.image_wrapper img {
  display: block;
  object-fit: cover;
  width: 100%;
  height: 187px;
  border-radius: 20px 0 0 0;
}
.overlay {
  position: absolute;
  background: rgba(57, 57, 57, 0.5);

  /* center overlay text */
  display: flex;
  align-items: center;
  justify-content: center;
}
.overlay_2 {
  inset: 0;
  border-radius: 20px 0 0 0;
}
.image_wrapper h5 a{
    text-decoration: none;
}
.image_wrapper h5 a:hover{
    text-decoration: underline;
}
@media only screen and (max-width: 768px) {
  .main-blog img{
    height: 602px !important;
  }
  .image_wrapper h5 a{
    font-size: 14px;
  }
}
@media only screen and (max-width: 425px) {
  .main-blog img{
    height: 352px !important;
  }
  .image_wrapper img{
    border-radius: 0 !important;
  }
  .overlay_2{
    border-radius: 0 !important;
  }
  #con img{
    clip-path: polygon(0 1%, 100% 1%, 100% 100%, 0% 100%);
  }
}
/* end blog section */
</style>
<?php $__env->startSection('content'); ?>
    <!-- section-3 -->
    <!-- image-slider -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: max-content;">
            <div class="carousel-item active c-item">
                <img src="<?php echo e(asset('build/images/siteimages/slider-img-1.jpg')); ?>" class="d-block w-100 c-img  h-100" alt="...">
            </div>
            <div class="carousel-item c-item">
                <img src="<?php echo e(asset('build/images/siteimages/slider-image-2.jpeg')); ?>" class="d-block w-100 c-img  h-100" alt="...">
            </div>
            <div class="carousel-item c-item">
                <img src="<?php echo e(asset('build/images/siteimages/slider-img-3.jpg')); ?>" class="d-block w-100 c-img  h-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- section-4 info-box -->
    <div class="container border border-success px-2 py-4"
        style="margin-top: -50px; position: relative ; z-index: 20;  background-color: #fff; box-shadow: 5px 8px 6px rgb(223, 248, 223) ;">
        <div class="box d-flex justify-content-around align-items-center search-ahpc">
            <h5 class=" col-lg-3 col-md-2  box-head text-center text-success fw-bold">Check The Registration</h5>
            <div class="col-lg-3 mb-3 form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Registration number">
                <label for="floatingInput" style="font-size: 13px">Surname or Registration Number</label>
            </div>
            <div class="col-lg-3 mb-3 form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Choose profession</option>
                    <option value="1">Arts Therapist</option>
                    <option value="2">Biomedical scientist</option>
                    <option value="3">Occupational therapist</option>
                </select>
                <label for="floatingSelect">Click Here to</label>
            </div>
            <a href="<?php echo e(url('/site/profile')); ?>" type="button" class="mb-3 col-lg-2 col-md-2 fs-5 btn btn-outline-success rounded-0 btn-lg px-md-2 py-2 px-lg-5">Search</a>
        </div>

    </div>
    <!-- section-4 cards  -->
    <div class="container mt-4 mb-5" id="propt">
        <div class="card-head py-5 text-center ">
            <h1 class="card-heading  ">
                How We Protect The Public
            </h1>
            <div class="border-center"></div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 ">

                    <div class="card-body text-center py-4">
                        <h5 class="card-title  fw-bold">Standards</h5>
                        <p class="card-text ">We set the <strong>standards </strong> for the professionals on our
                            Register.</p>
                    </div>
                    <div class="card-btn text-center mb-3">
                        <a href="#" class="card-btn card-btn-1 btn btn-outline-success ">View Our Standards</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">

                    <div class="card-body text-center py-4">
                        <h5 class="card-title fw-bold">Approved Programs</h5>
                        <p class="card-text">We <strong>approve programs</strong> which professionals must complete to
                            register with us.</p>
                    </div>
                    <div class="card-btn text-center mb-3">
                        <a href="https://ahpc.smarttechnologyhouse.net/our/descipline" class="card-btn card-btn-1 btn btn-outline-success ">Education Programs</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">

                    <div class="card-body text-center py-4">
                        <h5 class="card-title fw-bold"> Actions </h5>
                        <p class="card-text">We <strong> take action </strong>when professionals on our Register do not
                            meet our standards</p>
                    </div>
                    <div class="card-btn text-center mb-3">
                        <a href="#" class="card-btn card-btn-1 btn btn-outline-success ">Shoud I raise a Concern?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  banner section  -->
    <div class="container-fluid py-5 my-5" id="grade-1">
        <div class="container text-center py-3" style="color: #ffff;">
            <div class="banner-head text-center">
                <h1 class="banner-heading">
                    Your AHPC
                </h1>
                <div class="border-center-2"></div>
                <div class="banner-para mt-3 mb-5">
                    <h3 class="banner-para">We've created hubs with information relevant for you</h3>
                </div>

            </div>
            <div class="row justify-content-center mb-5 infor">
                <div class="d-flex justify-content-around gap-4 col-6 flex-wrap col-lg-12 your-ahpc">
                    <div class="logo-one ">
                        <a href="#" class=" "><i class="fa-solid fa-users"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff; padding: 25px;width: 100px; height: 100px; border-radius: 50%; "></i></a>
                        <p><a href="#" class="logo-one-heading  " style="color: #fff;text-decoration: none;">Member of the Public</a></p>
                    </div>
                    <div class="logo-one">
                        <a href="#" class=" "><i class="fa-solid fa-user"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff; padding: 25px;width: 100px; height: 100px; border-radius: 50%;"></i></a>
                        <p><a href="#" class="logo-one-heading " style="color: #fff;text-decoration: none;"> Our Registrants</a></p>
                    </div>
                    <div class="logo-one">
                        <a href="#" class=" "><i class="fa-solid fa-address-card"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff;padding: 25px;width: 100px; height: 100px; border-radius: 50%; "></i></a>
                        <p><a href="#" class="logo-one-heading " style="color: #fff;text-decoration: none;">Our Employees</a></p>
                    </div>
                    <div class="logo-one ">
                        <a href="#" class=" "><i class="fa-solid fa-graduation-cap"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff;  padding: 25px;width: 100px; height: 100px; border-radius: 50%;"></i></a>
                        <p><a href="#" class="logo-one-heading " style="color: #fff;text-decoration: none;">Educatioin Provider</a></p>
                    </div>
                    <div class="logo-one">
                        <a href="#" class=" "><i class="fa-solid fa-newspaper"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff; padding: 25px;width: 100px; height: 100px; border-radius: 50%;"></i></a>
                        <p><a href="#" class="logo-one-heading " style="color: #fff;text-decoration: none;">Journalists and Media</a></p>
                    </div>
                    <div class="logo-one ">
                        <a href="#" class=" "><i class="fa-solid fa-pencil"
                                style="font-size: 40px; color: #fff; border: 2px solid #fff; padding: 25px;width: 100px; height: 100px; border-radius: 50%;"></i></a>
                        <p><a href="#" class="logo-one-heading " style="color: #fff;text-decoration: none;">Our Students</a></p>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <!-- blog section  -->

    <div class="container" style="position: relative;">
        <div class="blog-content">
            <div class="blog-heading text-center row justify-content-center mb-5">
                <h5 class="fs-2">Latest From The Blog</h5>
                <div class="text-center" style="width: 100px;  height: 3px;background-color: rgb(32, 221, 79);"></div>
            </div>
            <div class="row all-blogs justify-content-center" id="blogsect">

                <div class="col-md-3">
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog1.jpg')); ?>" alt="" />
                            <div class="overlay overlay_2">
                              <h5><a href="#" class="text-light">Healthcare</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog2.jpeg')); ?>" alt=""  style="border-radius: 0" />
                            <div class="overlay overlay_2" style="border-radius: 0">
                              <h5><a href="#" class="text-light">Health Guidelines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog3.jpg')); ?>" alt=""  style="border-radius: 0 0 0 20px" />
                            <div class="overlay overlay_2" style="border-radius: 0 0 0 20px">
                              <h5><a href="#" class="text-light">Mindful Movement</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 sectionblog">
                    <div class="image_wrapper main-blog">
                        <img src="<?php echo e(asset('build/images/blog7.avif')); ?>" alt=""  style="border-radius: 0; height: 600px" />
                        <div class="overlay overlay_2" style="border-radius: 0 ">
                          <h5><a href="#" class="text-light">Health Events</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog4.jpg')); ?>" alt=""  style="border-radius: 0 20px 0 0" />
                            <div class="overlay overlay_2" style="border-radius: 0 20px 0 0">
                              <h5><a href="#" class="text-light">Healthy Food Meals</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog5.webp')); ?>" alt=""  style="border-radius: 0" />
                            <div class="overlay overlay_2" style="border-radius: 0">
                              <h5><a href="#" class="text-light">Health & Fitness </a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 sectionblog">
                        <div class="image_wrapper">
                            <img src="<?php echo e(asset('build/images/blog6.jpg')); ?>" alt=""  style="border-radius: 0 0 20px 0;" />
                            <div class="overlay overlay_2" style="border-radius: 0 0 20px 0;">
                              <h5><a href="#" class="text-light">Vitamins Classified</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <div class="container mt-3" id="con" style="box-shadow: 0px 6px 12px #9de9a7;">
        <div class="row my-5">
            <div class="col-md-8  px-0 py-">
                <img src="<?php echo e(asset('build/images/slider-img-1.png')); ?>" class="w-100" id="img" alt="">
            </div>
            <div class="col-md-4">

                <div class="card dis-card ">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #006837;">Our Discipline</h4>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <ul class="card-list my-3">
                            <li class="list-item">Anesthesia Technology</li>
                            <li class="list-item">Blood Banking Technology</li>
                            <li class="list-item">Medical Laboratory Technology</li>
                            <li class="list-item">Dental Technology</li>
                            <li class="list-item"> Endoscopy Technology</li>
                        </ul>
                        <a href="<?php echo e(url('/our/descipline')); ?>" class="btn btn-outline-success btn-read text-center mx-3">Read more</a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    
    <!-- banner  -->

    <div class="container-fluid mx-0 px-0 mt-5 ">
        <div class="row px-0 mx-0 justify-content-around align-items-center py-5" style="background-color: lightblue;">
            <div class="col-12 col-md-6 ">
                <div>
                    <h3 class="text-left">
                        The Allied Health Professionals Council is in session to discuss accreditation standards.
                    </h3>
                </div>
            </div>
            <div class="col-5 col-md-3">
                <a href="" class="btn btn-success py-2 px-3 py-lg-3 px-lg-5">Register Now</a>
            </div>
        </div>
    </div>

    <!-- banner end  -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('site.sitelayout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/site/home.blade.php ENDPATH**/ ?>