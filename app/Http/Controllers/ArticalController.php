<?php

namespace App\Http\Controllers;

use App\Models\articals;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    public function data(Request $req){
        // dd($req->post());

        $blog = articals::findOrNew($req->id);

        $blog->fill($req->only(['title', 'description', 'button_text','button_link']))->save();

        return redirect('settings?id=home-blogs')->with('success', 'uploaded successfully.');
    }

    public function deleteartical(Request $req)
    {
        $blog = articals::find($req->id);
        $blog->delete();
        return redirect('settings?id=home-blogs')->with('success', 'deleted successfully.');
    }



}
