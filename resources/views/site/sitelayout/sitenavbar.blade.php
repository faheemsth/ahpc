   <!-- secction-1-top-header -->
<style>
    .nav-item a:focus{
        color: #fff !important;
    }
    @media only screen and (max-width:770px){
    .nav-item{
        padding: 5px;
    }
}
</style>

   <div class="container">
    <div class="row text-center  my-2">
        <div class="col-lg-3">
            <a href="{{ route('site.home') }}"> <img src="{{ asset('build/images/siteimages/ahpc logo png.png') }}" alt="" class="ahcp-logo"></a>
        </div>
        <div class="col-lg-6 my-2 mt-4">
            <h2 class="heading-top my-0">ALLIED HEALTH PROFESSIONALS COUNCIL</h2>
            <p class="gov-heading fw-bold my-0 ">GOVERNMENT OF PAKISTAN</p>
            <p class="head-text ">Ministry of National Health Services Regulations & Coordination</p>
        </div>
        <div class="col-lg-3">
            <a href="{{ route('site.home') }}"><img src="{{ asset('build/images/siteimages/gov_logo.jpg') }}" alt="" class="gov-logo"></a>
        </div>
    </div>
</div>
<!-- section-1-top-header end -->

<!-- section-2  -->
<!-- main navbar start -->
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">

        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class=" "><i class="fa-solid fa-bars" style="color: #fff; font-size: 30px;"></i></span>
        </button>
        <div class="log-in  ">
            <a href="{{ url('/login') }}" class=" btn-1 ">Log In</a>
        </div>
        <div class="collapse navbar-collapse px-xl-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link px-3 " aria-current="page" href="{{ route('site.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" aria-current="page" href="{{ url('/our/descipline') }}">Our Disciplines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" aria-current="page" href="{{ url('/member/list') }}">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" aria-current="page" href="{{ url('/maintenance') }}">Concerns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" aria-current="page" href="{{ url('/download/form') }}">Download</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="border:0px">
                        News and Events
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/maintenance') }}">Blogs</a></li>
                        <li><a class="dropdown-item" href="{{ url('/maintenance') }}">Campaign</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/maintenance') }}">Related News</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown d-none">
                <button class="btn text-white dropdown-toggle border-0" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-language fs-4" style="color: #fff;"></i>
                </button>
                <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="#">Chines</a></li>
                    <li><a class="dropdown-item" href="#">Franch</a></li>
                    <li><a class="dropdown-item" href="#">Gramen</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                </ul>
            </div>
            <div class="dropdown  my-3 my-lg-0">
                @if (!Auth::check())
                <a href="{{ url('/login') }}" class=" btn-1 log-in-two ">Log In</a>

                <a href="" role="button" data-bs-toggle="dropdown" class="btn-1  dropdown-toggle"
                    aria-expanded="false">Registration</a>
                <ul class="dropdown-menu mt-3">
                    <li><a class="dropdown-item" href="{{ url('/institue/signup') }}">For Institution</a></li>
                    <li><a class="dropdown-item" href="{{ url('/maintenance') }}">For Student</a></li>

                    <li><a class="dropdown-item" href="{{ url('overseass/signup') }}">For Overseas</a></li>
                    <li><a class="dropdown-item" href="{{ url('/ahpc/signup') }}">For AHP's</a></li>
                </ul>
                @else
                <a href="{{ url('/dashboard') }}" class=" btn-1 log-in-two ">Dashboard</a>
                @endif

            </div>
        </div>

    </div>
</nav>
