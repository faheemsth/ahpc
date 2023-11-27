<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use App\Models\Institute;
use App\Models\InstituteType;
use App\Models\Invoice;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AhpcController extends Controller
{
    public function index()
    {
        //

        $user_query = User::where('role_id', 4);

        if (isset($_GET['status']) && $_GET['status'] != '') {
            $user_query->where(['inst_approval_status' => $_GET['status']]);
        }

        if (isset($_GET['institute_type']) && !empty($_GET['institute_type'])) {
            $user_query->where(['institute_type' => $_GET['institute_type']]);
        }

        if (isset($_GET['institute']) && !empty($_GET['institute'])) {
            $user_query->where(['institute' => $_GET['institute']]);
        }

        $overseas = $user_query->get();


        $institutes_c = Institute::all();
        $institute_types = InstituteType::all();


        return view('user-panels.admin-panel.ahpc.index', compact('overseas', 'institutes_c', 'institute_types'));
    }
    public function create()
    {
        $FeeStructures = FeeStructure::orderBy('cdd', 'ASC')->where('currency','PKR')->get();
        return view('site.ahpcsignup', compact('FeeStructures'));
    }
    public function store(Request $request)
    {

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('overseass'), $imageName);
        $user = new User();
        $user->first_name = $request->name;
        $user->tehsil = '';
        $user->district = '';
        $user->province = '';
        $user->student_num = '';
        $user->doe = '';
        $user->institute = '';
        $user->ceo_name = '';
        $user->qualification = '';
        $user->declaration = '';
        $user->postel_address = $request->address;
        $user->gender = $request->gender;
        $user->cnic_no = $request->cnic;
        $user->contact = $request->contact_no;
        $user->email = $request->email;
        $user->password = Hash::make('1234');
        $user->role_id = 4;
        $user->avatar =  'overseass/' . $imageName;
        $user->save();


        $user_detail = new UserDetail();
        $user_detail->user_id = $user->id;
        $user_detail->father_name = $request->father_name;
        $user_detail->title = $request->title;
        $user_detail->duration = $request->duration;
        $user_detail->registration_no = $request->registration_no;
        $user_detail->issue_date = $request->issue_date;
        $user_detail->first_time_registration = $request->is_first_registration == 'on' ? 1 : 0;
        $user_detail->last_registration_expire_date = $request->last_registration_expire_date;
        $user_detail->fee_slip_no = $request->fee_deposit_slip;
        $user_detail->fee_deposit_date = $request->fee_deposit_date;
        $user_detail->fee_amount = $request->fee_deposit_amount;

        $user_detail->date_of_birth = $request->date_of_birth;
        $user_detail->country = $request->country;


        $user_detail->save();


        $invoice = new Invoice;
        $invoice->user_id = $user->id;
        $invoice->invoice_id = date("y") . date("m") . time();
        $invoice->dis_ids = '';
        $invoice->disciplines = '';
        $invoice->total_amount = $request->fee_deposit_amount;
        $invoice->description = 'Overseas Fee';
        $invoice->save();

        return redirect()->back()->with('success', 'Account created successfully.');
    }
}
