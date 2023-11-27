@extends('site.sitelayout.app')
<style>


#member p{
    margin-top: 0;
    font-size: 15px;
}
#member img{
    width: 30%;
}
#member button{
    align-items: center;
}
#member a{
    text-decoration: none
}

@media only screen  and (min-device-width : 320px)  and (max-device-width : 480px) {
    #member img{
        width: 70%;
    }
    .profile-direction{
        flex-direction: column;
    }
}
</style>

@section('content')

<div class="container" id="member">
    <div class="row col-12 text-center mt-5 justify-content-center">
     <h1 style="color: rgb(5, 186, 65)"><strong>Member of the Council</strong></h1>
     <div style="width: 60px;height: 3px;background-color: rgb(37, 184, 37)"></div>
    </div>
    <div class="row">
     <div class="col-md-10 col-lg-8 col-12 mt-5">
         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/khan.jpg') }}" alt="" class="m-2">
             <div class="mt-3 ms-3">
                 <h5>President (AHPC)<br>Mr. Zamurrad Khan,(Hilal-e-Imtiaz)</h5>
                 <p class="mb-2">Philanthropist,<br>CEO, Pakistan Sweet Homes, H-9/4,<br>Islamabad</p>
                 <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex  mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-3 ms-3">
                 <h5>Vice President (AHPC)<br>Mr. Muhammad Ismail Jiskani</h5>
                 <p class="mb-2">B.Sc. Vision Sciences (Pak), D-Optometry (PIO ASTEH),<br>Chief Technician, JPMC, Karachi,<br>Government of the Sindh</p>
                 <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
                </div>
         </div>


         <div class="col-12 d-flex  mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-4 ms-3">
                 <h5>Brig. Muhammad Naveed Khan</h5>
                 <p>Commandant Army Medical Corps School,<br>Centre and Record Wing,<br>Surgeon General of Medical Corps of the Armed Forces.</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>



         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-4 ms-3">
                 <h5>Dr. Manan Haider Khan</h5>
                 <p>PT, PhD Rehabilitation Sciences.<br>ICT, Islamabad.</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>



         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-4 ms-3">
                 <h5>Mr. Sajid Mahmood</h5>
                 <p>Programme Coordinator,<br>Physiotherapy, University of Health Sciences,  Lahore,<br>Government of the Punjab.</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-3 ms-3">
                 <h5>Mr. Anees Muhammad</h5>
                 <p class="mb-2">Clinical Technologist Pathologist, BS (MLT),<br> Hons. M.Phil(Med. Lab Sciences), Ph.D. Molecular Biology,<br>Zangali Bazar, Kohat Road, Peshawar,<br>Government of the KPK</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-4 ms-3">
                 <h5>Mr. Javed Iqbal Buzdar Baloch</h5>
                 <p>Anesthesia Technician, WAPDA Hospital,<br>Arbab Ghulam Ali Road, Kili Debha, Quetta,<br>Government of the Balochistan</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-2 ms-3">
                 <h5 class="mb-0">Sardar Khalid Mehmood Khan</h5>
                 <p class="mb-2">Chief Technologist,<br>CMH Rawalakot (Afiliated Hospital Poonch Medical College Poonch),<br>ADHO (CDC) Office Rawalakot, AJ & K,<br>Government of the AJ & K</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-3 ms-3">
                 <h5>Dr. Mehran Kousar</h5>
                 <p class="mb-2">Assistant Professor, Ph.D (Biochemistry and Molecular Biology),<br>Karakuram International University,<br>Government of the Gilgit-Baltistan</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-3 ms-3">
                 <h5>Malik Saqib Mehmood</h5>
                 <p class="mb-2">Advocate Supreme Court of Pakistan<br>LLM, Coventry University UK,<br>Legal Professional Member.<br>Islamabad.</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


         <div class="col-12 d-flex mb-4 py-3 profile-direction" style="border: 1px solid rgb(211, 211, 211);border-radius: 5px;">
             <img src="{{ asset('build/images/users/images.jpg') }}" alt="" class="m-2">
             <div class="mt-4 ms-3">
                 <h5>Rao Sabir Ali</h5>
                 <p>Charted Accountant,<br>FCA, CIMA-UK, NUST,<br>Islamabad.</p>
               <a href="{{ url('/site/profile') }}" class="px-3 py-2 text-light bg-success  rounded-2">Review Profile</a>
             </div>
         </div>


     </div>
     <div class="col-4"></div>
    </div>
 </div>


@endsection
