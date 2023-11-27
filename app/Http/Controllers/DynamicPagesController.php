<?php

namespace App\Http\Controllers;

use App\Models\Dynamic_pages;
use Illuminate\Http\Request;

class DynamicPagesController extends Controller
{
    public function uploadSlider(Request $req){

        $image1 = $req->file('slider_image1');
        $filename1 = time() . '_' . uniqid() . '.' . $image1->getClientOriginalExtension();
        $image1->move('images', $filename1, 'public');

        $image2 = $req->file('slider_image2');
        $filename2 = time() . '_' . uniqid() . '.' . $image2->getClientOriginalExtension();
        $image2->move('images', $filename2, 'public');

        $image3 = $req->file('slider_image3');
        $filename3 = time() . '_' . uniqid() . '.' . $image3->getClientOriginalExtension();
        $image3->move('images', $filename3, 'public');

        $imageModel = new Dynamic_pages();
        $imageModel->slider1 = 'images/' . $filename1;
        $imageModel->slider2 = 'images/' . $filename2;
        $imageModel->slider3 = 'images/' . $filename3;
        $imageModel->save();

        return redirect('settings?id=home-page')->with('success', 'Images uploaded successfully.');
    }


    public function upload(Request $req){
       Dynamic_pages::create([
        'address'=>$req->address,
        'email'=>$req->email,
        'phone'=>$req->ph_num,
       ]);
       return back()->with('success','Data Uploaded Successfully');
    }

}
