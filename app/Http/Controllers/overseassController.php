<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Discipline;
use App\Models\FeeStructure;
use App\Models\Institute;
use App\Models\InstituteProgram;
use App\Models\InstituteType;
use App\Models\Invoice;
use App\Models\OverseasDocument;
use App\Models\OverseasDocumentType;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class overseassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user_query = User::where('role_id', 3);

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


        return view('user-panels.admin-panel.overseas.index', compact('overseas', 'institutes_c', 'institute_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $FeeStructures = FeeStructure::orderBy('cdd', 'ASC')->where('currency','USD')->get();
        return view('site.overseassignup', compact('FeeStructures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
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
        $user->role_id = 3;
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

    public function profile()
    {
        $user = \Auth::user();

        $ids = \Auth::user()->discipline;
        $ids = explode(',', $ids);
        $disciplines = Discipline::whereIn('id', $ids)->get();
        $doc_types = OverseasDocumentType::get();

        $inst_prgs = InstituteProgram::where('user_id', $user->id)->get();
        $invoices = Invoice::where('user_id', $user->id)->get();
        $logs = ActivityLog::where('user_id', $user->id)->orderByDesc('id')->get();
        // dd($invoices);
        return view('user-panels.overseas.profile', compact('disciplines', 'doc_types', 'inst_prgs', 'invoices', 'logs'));
    }

    public function storeDocument(Request $request)
    {

        $user = \Auth::user();

        $target_dir = 'storage/overseas_documents/' . $user->id;

        if (!File::isDirectory($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file = $request->file('doc_file');


        //Move Uploaded File
        $random_no = time();
        $file_name = $request->type . '-' . $random_no . '-' . $file->getClientOriginalName();

        if ($file->move($target_dir, $file_name)) {
            $doc_type = OverseasDocumentType::where('type', "$request->type")->first();

            $document = new OverseasDocument();
            $document->user_id = $user->id;
            $document->file = $file_name;
            $document->overseas_document_type_id = $doc_type->id;
            $document->save();
        }

        $doc_types = OverseasDocumentType::get();
        $docs_uploaded = true;
        foreach ($doc_types as $doc_type) {
            $doc = OverseasDocument::where('overseas_document_type_id', $doc_type->id)->where('user_id', $user->id)->first();
            if ($doc) {
            } else {
                $docs_uploaded = false;
            }
        }


        if (\Auth::user()->documents_uploaded == 0 && $docs_uploaded == false) {
            $user = \Auth::user();
            $user->documents_uploaded = 1;
            $user->inst_prf_completion = $user->inst_prf_completion + 25;
            $user->save();
        }
        // Session::flash('message', 'User Details Updated successfully!');
        // Session::flash('alert-class', 'alert-success');

        return redirect()->back();
    }
}
