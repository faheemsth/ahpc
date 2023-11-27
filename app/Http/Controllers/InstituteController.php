<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\InstituteType;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$institutes = Institute::all();
        $user_query = User::where('role_id',2);

        if(isset($_GET['status']) && $_GET['status'] != '' ){
            $user_query->where(['inst_approval_status' => $_GET['status']]);
        }

        if(isset($_GET['institute_type']) && !empty($_GET['institute_type'])){
            $user_query->where(['institute_type' => $_GET['institute_type']]);
        }

        if(isset($_GET['institute']) && !empty($_GET['institute'])){
            $user_query->where(['institute' => $_GET['institute']]);
        }

        $institutes = $user_query->get();
        $approved_inst_count = User::where('role_id',2)->where('inst_approval_status',4)->count();
        $total_earnings = Invoice::where('invoice_status',1)->sum('total_amount');


        $institutes_c = Institute::all();
        $institute_types = InstituteType::all();


        return view('user-panels.admin-panel.Institute_profile.index',compact('institutes','approved_inst_count','total_earnings', 'institutes_c', 'institute_types'));

        //return view('user-panels.admin-panel.institute_profile.index', compact('institutes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
