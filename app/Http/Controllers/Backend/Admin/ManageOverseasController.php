<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\InstituteProgram;
use App\Models\Invoice;
use App\Models\OverseasDocument;
use App\Models\OverseasDocumentType;
use App\Models\User;
use App\Models\UserDetail;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;

class ManageOverseasController extends Controller
{
    //
    public function index($id){
        $user = User::select(['users.*'])->join('user_details','user_details.user_id', '=', 'users.id')->where('users.id',$id)->first();


        $doc_types = OverseasDocumentType::get();


        foreach($doc_types as $doc_type){
            $documents = OverseasDocument::where('user_id',$user->id)->where('overseas_document_type_id',$doc_type->overseas_document_type_id)->get();
            $doc_type->documents = $documents;
        }
        $inst_prgs = InstituteProgram::where('user_id',$user->id)->get();
        $invoices = Invoice::where('user_id',$user->id)->get();
        return view('user-panels.admin-panel.overseas.profile',compact('user','doc_types','inst_prgs','invoices'));
    }

    public function updateProfile(Request $request,$id){
        $data =$request->all();



        $is_exist = User::where('first_name', $data['name'])
        ->where('id', '!=', $id)
        ->first();


        if($is_exist){
            return redirect()->back()->with(['success'=>'Name already exist']);
        }

        $user = User::where('id',$id)->first();
        //$user->update($data );



        $user = new User();
        $user->first_name = $request->name;
        $user->postel_address = $request->address;
        $user->gender = $request->gender;
        $user->cnic_no = $request->cnic;
        $user->contact = $request->contact_no;
        $user->email = $request->email;
        $user->update();


        $user_detail = new UserDetail();
        $user_detail->user_id = $user->id;
        $user_detail->father_name = $request->father_name;
        // $user_detail->title = $request->title;
        // $user_detail->duration = $request->duration;
        // $user_detail->registration_no = $request->registration_no;
        // $user_detail->issue_date = $request->issue_date;
        // $user_detail->first_time_registration = $request->is_first_registration == 'on' ? 1 : 0;
        // $user_detail->last_registration_expire_date = $request->last_registration_expire_date;
        // $user_detail->fee_slip_no = $request->fee_deposit_slip;
        // $user_detail->fee_deposit_date = $request->fee_deposit_date;
        // $user_detail->fee_amount = $request->fee_deposit_amount;
        $user_detail->update();


        $title = 'Profile Updated';
        $description = 'Profile updated by '.\Auth::user()->first_name;

        $log = new ActivityLogService();
        $log->saveLog($id,\Auth::user()->id,$title,$description);

        return redirect()->back()->with(['success'=>'Profile Updated Successfully!']);
    }



    public function profile_avatar(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $image = $request->file('file');
        $imageName = $_FILES['file']['name'];
        $imageName = strtolower($imageName);
        $imageName = str_replace(" ","_",$imageName);
        $target_dir = 'storage/avatar/'.$user->id;
        if (File::isDirectory($target_dir)) {
            File::deleteDirectory($target_dir);
        }
        if (!File::isDirectory($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image->move($target_dir, $imageName);
        $user->avatar = $target_dir.'/' .$imageName;
        $user->save();

        $title = 'Profile Image Updated';
        $description = 'Profile Image updated by '.\Auth::user()->first_name;

        $log = new ActivityLogService();
        $log->saveLog($request->user_id,\Auth::user()->id,$title,$description);

        return response()->json(['success'=>true]);
    }
    public function chnagePassword(Request $request)
    {
        # Validation
        $validate = $request->validate([
            'password' => 'required|min:8',
        ]);
        #Update the new Password
        if ($validate) {
            $customer = User::where('id',  $request->user_id)->update([
            'password' => Hash::make($request->password)
            ]);
        }

        $title = 'Password Changed';
        $description = 'Password updated by '.\Auth::user()->first_name;

        $log = new ActivityLogService();
        $log->saveLog($request->user_id,\Auth::user()->id,$title,$description);

        return redirect()->back()->with(['success'=>'Password Updated Successfully!']);
    }

    public function updateDocument(Request $request){

        $document = OverseasDocument::where('user_id',$request->inst)->where('overseas_document_type_id',$request->type)->first();
         OverseasDocument::where('user_id',$request->inst)->where('overseas_document_type_id',$request->type)->update([
            'status' => $request->status
        ]);

        if($request->status == 1){

            $title = 'Document Approved';
            $description = $document->doc_type_name.' Document approved by '.\Auth::user()->first_name;

            $log = new ActivityLogService();
            $log->saveLog($request->inst,\Auth::user()->id,$title,$description);

        }else if($request->status == 2){
            $title = 'Document Rejected';
            $description = $document->doc_type_name.' Document rejected by '.\Auth::user()->first_name;

            $log = new ActivityLogService();
            $log->saveLog($request->inst,\Auth::user()->id,$title,$description);
        }

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Document status updated!"
        ], 200);

    }
}
