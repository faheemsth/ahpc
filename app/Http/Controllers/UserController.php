<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::where('id', '!=', 2)->get();
        return view('user-panels.admin-panel.users.index', compact('users'));
    }
}
