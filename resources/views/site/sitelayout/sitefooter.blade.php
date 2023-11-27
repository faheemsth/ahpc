    <!-- footer  -->
    <style>
        #Footer p i{
            margin-right:5px;

        }
        #Footer p{
            cursor: pointer ;
        }
    </style>
    <footer id="Footer"style="background-color:#005d32;" class="page-footer font-small stylish-color-dark py-4">
        <div style="background-color:#005d32;" class="container text-md-left">
          <div class="row">
            <div class="col-md-6 col-lg-4 text-start">
              <!-- Content -->
              <a href="{{ route('site.home') }}" class="text-decoration-none d-flex align-items-center gap-2">
                <img src="{{ asset('build/images/siteimages/ahpc logo png.png') }}" alt="" srcset="">
                <h5 class="text-white">ALLIED HEALTH PROFESSIONALS COUNCIL</h5>
              </a>
              <p class="text-white mt-3">Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                consectetur
                adipisicing elit.</p>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div id="link10" class="col-md-6 col-lg-2 col-xl-2 mx-auto mb-4 justify-content-start">
              <h6 class="text-white text-uppercase fs-5 font-weight-bold mt-2">Abouts</h6>
              <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px; background-color: #fff;">
              <p>
                <a href="{{ url('/maintenance') }}">Blog</a>
              </p>
              <p>
                <a href="{{ url('/maintenance') }}">FAQ's</a>
              </p>
              <p>
                <a href="{{ url('/maintenance') }}">Private & Policy</a>
              </p>
              <p>
                <a href="{{ url('/maintenance') }}">Terms & Conditions</a>
              </p>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div id="link10" class="col-md-6 col-lg-2 col-xl-2 mx-auto mb-4 justify-content-start">
              <h6 class="text-white text-uppercase fs-5 font-weight-bold mt-2">Useful links</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
              <p>
                <a href="{{ url('/login') }}">Your Account</a>
              </p>
              <p>
                <a href="{{ url('/maintenance') }}">Check Registration</a>
              </p>
              <p>
                <a href="{{ url('/member/list') }}">Members</a>
              </p>
              <p>
                <a href="{{ url('/maintenance') }}">Help</a>
              </p>
            </div>
            <hr class="clearfix w-100 d-md-none text-white">
            <div class="col-md-6 col-lg-2 col-xl-3 mx-auto mb-4 justify-content-start">
              <h6 class="text-white text-uppercase fs-5 font-weight-bold mt-2">Contact</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p class="text-white d-flex gap-1">
                <i class="fas fa-home mr-3"></i> Ex. PHRC Building, Opp. Radio Pakistan,Shahra-e-Jamhuriat, Sector G-5/2,Islamabad</p>
                <p>
                  <a  class="text-white text-decoration-none" href = "mailto: ahpcnewreg@gmail.com">
                    <i class="fas fa-envelope mr-3"></i> ahpcnewreg@gmail.com</a>
                </p>
              <p  class="text-white">
                  <a href="tel:051-920-7367"  class="text-white text-decoration-none">
                <i class="fas fa-phone mr-3"></i> 051-920-7367 </p>
                  </a>
              <p  class="text-white">
                <i class="fas fa-phone mr-3"></i> 051-920-7386</p>
            </div>
          </div>
        </div>
        <hr>
        <!-- Call to action -->
        <!-- Copyright -->
        <div  style="background-color:#005d32;" class="text-white footer-copyright px-3 px-md-5 py-2 text-center">
          Copyright © 2023: Design and Develop by STH
        </div>
      </footer>
    <!-- end footer  -->
