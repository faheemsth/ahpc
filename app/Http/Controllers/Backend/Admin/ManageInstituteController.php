<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discipline;
use App\Models\DocumentType;
use App\Models\Document;
use App\Models\Invoice;
use App\Models\InstituteProgram;
use App\Models\OverseasDocument;
use App\Models\OverseasDocumentType;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Services\ActivityLogService;

class ManageInstituteController extends Controller
{
    public function index($id){
        $user = User::where('id',$id)->first();
        $ids = $user->discipline;
        $ids = explode(',',$ids);
        $disciplines = Discipline::whereIn('id',$ids)->get();
        $doc_types = OverseasDocumentType::get();
        $inst_prgs = InstituteProgram::where('user_id',$user->id)->get();
        $invoices = Invoice::where('user_id',$user->id)->get();
        return view('user-panels.admin-panel.Institute_profile.profile',compact('user','disciplines','doc_types','inst_prgs','invoices'));
    }

    public function updateDocument(Request $request){

        $documents = Document::where('user_id',$request->inst)->where('doc_type',$request->type)->update(['status'=>$request->status,'description'=>$request->description]);
        $document = Document::where('user_id',$request->inst)->where('doc_type',$request->type)->first();

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

    public function updateProgram(Request $request){

        $inst = InstituteProgram::where('user_id',$request->inst)->where('program_id',$request->prg_id)->update(['program_status'=>$request->status,'description'=>$request->description]);
        $inst = InstituteProgram::where('user_id',$request->inst)->where('program_id',$request->prg_id)->first();

        if($request->status == 1){

            $title = 'Program Approved';
            $description = 'Program '.$inst->program_name.' of '. $inst->dis_name.' approved by '.\Auth::user()->first_name;

            $log = new ActivityLogService();
            $log->saveLog($request->inst,\Auth::user()->id,$title,$description);

        }else if($request->status == 2){
            $title = 'Program Rejected';
            $description = 'Program '.$inst->program_name.' of '. $inst->dis_name.' rejected by '.\Auth::user()->first_name;

            $log = new ActivityLogService();
            $log->saveLog($request->inst,\Auth::user()->id,$title,$description);
        }

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Program status updated!"
        ], 200);

    }

    public function updateProfile(Request $request,$id){
        $data =$request->all();


        $is_exist = User::where('first_name', $data['first_name'])
        ->where('id', '!=', $id)
        ->first();


        if($is_exist){
            return redirect()->back()->with(['success'=>'Name already exist']);
        }

        $user = User::where('id',$id)->first();
        $user->update($data );

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

    public function updateInvoiceStatus(Request $request){
        $invoice  = Invoice::where('id',$request->id)->first();
        if($invoice){
            $invoice->status = $request->status;
            $invoice->status_description = $request->description;
            $invoice->invoice_status = $request->invoice_status;
            $invoice->save();
            $status = 'Pending';
            if($request->status == 1){
                $status = 'Approved';
                if($invoice->invoice_type == 0){

                    $title = 'Discipline Invoice Status';
                    $description = 'Discipline invoice status approved by '.\Auth::user()->first_name.'<br>'.$request->description;

                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);

                    $user = User::where('id',$invoice->user_id)->first();
                    $user->inst_approval_status = 1;
                    $user->save();
                }elseif($invoice->invoice_type == 1){

                    $title = 'Zero Visit Invoice Status';
                    $description = 'Zero visit invoice status approved by '.\Auth::user()->first_name.'<br>'.$request->description;

                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);

                    $user = User::where('id',$invoice->user_id)->first();
                    $user->inst_approval_status = 2;
                    $user->save();
                }else{
                    $user = User::where('id',$invoice->user_id)->first();

                    $title = 'Accreditation Visit Invoice Status';
                    $description = 'Accreditation visit invoice status approved by '.\Auth::user()->first_name.'<br>'.$request->description;
                    if($user->inst_approval_status == 3){
                        $title = 'Re-Accreditation Visit Invoice Status';
                        $description = 'Re-Accreditation visit invoice status approved by '.\Auth::user()->first_name.'<br>'.$request->description;
                    }
                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);

                    $user = User::where('id',$invoice->user_id)->first();
                    $user->inst_approval_status = 4;
                    $user->save();
                }

            }elseif($request->status == 2){
                $status = 'Rejected';
                if($invoice->invoice_type == 2){

                    $title = 'Accreditation Visit Invoice Status';
                    $description = 'Accreditation visit invoice status rejected by '.\Auth::user()->first_name.'<br>'.$request->description;

                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);

                    $user = User::where('id',$invoice->user_id)->first();
                    $user->inst_approval_status = 3;
                    $user->save();

                }else if($invoice->invoice_type == 1){
                    $title = 'Zero Visit Invoice Status';
                    $description = 'Zero visit invoice status rejected by '.\Auth::user()->first_name.'<br>'.$request->description;

                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);
                }else if($invoice->invoice_type == 3){
                    $title = 'Re-Accreditation Visit Invoice Status';
                    $description = 'Re-Accreditation visit invoice status rejected by '.\Auth::user()->first_name.'<br>'.$request->description;

                    $log = new ActivityLogService();
                    $log->saveLog($invoice->user_id,\Auth::user()->id,$title,$description);
                }
            }
            return response()->json([
                'isSuccess' => true,
                'status_code' => 200,
                'Message' => "Invoice ".$status."!"
            ], 200);
        }
    }

    public function addVisit(Request $request){

        $num = 0;
        $type = 'Zero';
        $inv_type = 0;

        $inv = Invoice::latest()->first();

        if($inv){
            $num = $inv->id+1;
        }else{
            $num = 1;
        }

        if($request->visit_type == 1){
            $type = 'Zero Visit';
            $inv_type = 1;
        }elseif($request->visit_type == 2){
            $type = 'Accreditation Visit';
            $inv_type = 2;
        }elseif($request->visit_type == 3){
            $type = 'Re-Accreditation Visit';
            $inv_type = 3;
        }

        $num = $this->getFiveDigitId($num);
        $num = substr($num, 0, -1);
        $invoice = Invoice::where('user_id',$request->inst_id)->where('description',$type)->first();
        if($invoice){
            return response()->json([
                'isSuccess' => true,
                'status_code' => 200,
                'Message' => "Already existed"
            ], 200);
        }
        $invoice = new Invoice;
        $invoice->user_id = $request->inst_id;
        $invoice->invoice_id = date("y").date("m").$num;

        $invoice->total_amount = $request->visit_amount;
        $invoice->invoice_type = $inv_type;

        $invoice->description = $type;
        $invoice->save();

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Invoice created for ".$type."."
        ], 200);

    }

    function getFiveDigitId( $numericId)
    {

        $id = $numericId/100000; // will give you 0.00001
        $id = sprintf('%f', $id);
        // dd($id);
        $strId = strVal($id); // convert to string
        if(str_starts_with($strId, "0.")){
            return substr($strId, 2);
        }else{
            return $numericId;
        }
    }

}
