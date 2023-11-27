@extends('site.sitelayout.app')
@section('content')

<div class="container my-3" id="profile">
    <div class="row col-md-12 my-5 mb-3 justify-content-between">
        <div class="col-lg-9 d-md-flex">
        <div class="">
            <img src="{{ asset('build/images/siteimages/pic.jpg') }}" alt="Doctor" class="img-fluid">
        </div>
            <div class="ms-md-4 mt-2">
           <div class="d-flex align-items-baseline"> <h3 class="font1">Zamurrad Khan</h3 >
            <small class="text-danger ms-2 "><strong>Registered!</strong></small></div>
            <p class="paragraph">
                <i class="fa-solid fa-landmark-flag"></i>
                Ex-Member of National Assembly of Pakistan</p class="paragraph">
            <p class="paragraph">
                <i class="fa fa-solid fa-circle-dollar-to-slot"></i>
                Ex-Managing Director Pakistan Bait-ul-Mal</p class="paragraph">
            <p class="paragraph">
                <i class="fa-solid fa-user-doctor"></i>
                Specialty: Medical Doctor at NHS</p class="paragraph">
            <p class="paragraph">
                <i class="fa fa-solid fa-briefcase"></i>
                Experience: 14 years 7 months</p class="paragraph">
            <div class="mt-3">
            <button class="expbtn">ex-MD</button>
            <button class="expbtn"> former chairman of Pakistan Bait-ul-Mal</button>
            <button class="expbtn mt-2 mt-lg-0">ex-MNA</button>

            </div>
        </div>

        </div>
        <div class="col-3 d-none d-lg-block">
            <div class="card container mt-md-0 mt-2">
                <!--<h3 class="mt-3">Lets Connect</h3>-->
                <!--<p class="ms-3">Lorem ipsum dolor sit</p>-->
                <!--<p class="ms-3">Lorem ipsum dolor sit lorem</p>-->
                <button class="card-btn my-3 py-2 px-2 ">Appointment</button>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">About</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Awards</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h5><p>Introduction</p></h5>
                <p>Zamarud Khan is an ex-MD, former chairman of Pakistan Bait-ul-Mal, ex-MNA and the Patron in Chief of Pakistan Sweet Homes – an internationally renowned project for the welfare of orphans of Pakistan..</p>
                <h5><p>Legal Practice:</p></h5>



                    <p>•  Practiced law  (1993-2001).</p>

                   <p>•  Elected as General Secretary Rawalpindi Bar Council from 1999-2000.</p>

                   <h5><p>As Parliamentarian:</p></h5>



                <p>• Due to family background and social contacts in the society, contested election for  member of the National Assembly of Pakistan (2002-2007) and was elected with good margin.</p>

                <h5>President,  Allied Health Professionals Council (AHPC):</p></h5>



<p>• On 3rd May, 2023, Mr. Zamurrad Khan has been unanimously elected as the first President of Allied Health Professionals Council (AHPC) under the Federal Ministry of National Health Services Regulations and Coordination.</p>

<p class="mb-3">•  To regulate education, training, practice, functions and registration of Allied Health Professionals in Pakistan for public health and to make a uniform standard of basic and higher education in various Allied Health disciplines and to consolidate the law regulating to the registration of all professionals in various disciplines of Allied Health Professionals, Majlis-e-Shoora (Parliament) passed an Act to make the provisions for the establishment of the Allied Health Professionals Council (AHPC).</p>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> <h5><p>HILAL-E-IMTIAZ</p></h5>
            <p>Besides various medals and awards by public and private organizations,  the civil award (HILAL-E-IMTIAZ) was conferred by the Government of Pakistan in recognition of his services, rendered in the social set up.</p>



                <h5><p>DEVELOPMENT LEADERSHIP AWARD (DLA)</p></h5>



                <p>On the auspicious occasion of 75th anniversary of Pakistan in August, 2022, Government of Pakistan announced “75 Development Leadership Awards” to recognize and celebrate the exemplary efforts and outstanding services rendered by individuals and organizations towards socio-economic development of Pakistan. In recognition of his services, rendered in the social set up, Development Leadership Award was conferred by the Government of Pakistan on 8th August, 2023.</p></div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> <h5><p>Location:</p></h5>
            <p>Zamindar House Naseer Abad Rawalpindi. Cantt.</p>
            <h5><p>Phone No:</p></h5>
            <p>5460866</p></div>
      </div>

</div>


@endsection()
