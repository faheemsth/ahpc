<?php

namespace App\Http\Controllers;

use App\Models\articals;
use App\Models\Blogs;
use App\Models\Discipline;
use App\Models\Dynamic_pages;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $req)
    {
        $blog = Blogs::findOrNew($req->id);
        $imageFields = ['feature_image', 'related_image1', 'related_image2'];

        foreach ($imageFields as $field) {
            $image = $req->file($field);
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename, 'public');
            $blog->$field = 'images/' . $filename;
        }

        $blog->fill($req->only(['title', 'description', 'short_description']))->save();

        return redirect('settings?id=home-blogs')->with('success', 'Images uploaded successfully.');
    }

    public function deleteBlog(Request $req)
    {
        $blog = Blogs::find($req->id);
        $blog->delete();
        return redirect('settings?id=home-blogs')->with('success', 'Blog deleted successfully.');
    }

    public function sitehome(Request $request)
    {
        $articals = articals::all();
        $blogs = Blogs::all();
        $disciplines=Discipline::all();
        $dynamic_pages=Dynamic_pages::all();
        return view('site.home',compact('blogs','disciplines','dynamic_pages',"articals"));
    }

    public function slug($slug)
    {
        $blogs = Blogs::where('title',$slug)->first();
        return view('site.home',compact('blogs'));
    }



}
