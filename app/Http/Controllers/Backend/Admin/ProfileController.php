<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Discipline;
use App\Models\DocumentType;
use App\Models\Document;
use App\Models\InstituteProgram;
use App\Models\Invoice;
use App\Models\OverseasDocument;
use App\Models\OverseasDocumentType;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = \Auth::user();
        $ids = \Auth::user()->discipline;
        $ids = explode(',',$ids);
        $disciplines = Discipline::whereIn('id',$ids)->get();
        $doc_types = DocumentType::where('institute',$user->institute)->where('institute_type',$user->institute_type)->get();
        foreach($doc_types as $doc_type){
            $documents = Document::where('user_id',$user->id)->where('doc_type',$doc_type->id)->get();
            $doc_type->documents = $documents;
        }
        $inst_prgs = InstituteProgram::where('user_id',$user->id)->get();

        // dd($doc_types);
        return view('user-panels.admin-panel.users.profile',compact('disciplines','doc_types','inst_prgs'));
    }

    public function storeDocument(Request $request){

        $user = \Auth::user();

        $target_dir = 'storage/institute_documents/'.$user->id;

        if (!File::isDirectory($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file = $request->file('doc_file');
        //Move Uploaded File
        $random_no = time();
        $file_name = $request->type.'-'.$random_no.'-'.$file->getClientOriginalName();

        if($file->move($target_dir, $file_name)) {
            $doc_type = DocumentType::where('title',$request->type)->where('institute',$user->institute)->where('institute_type',$user->institute_type)->first();

            $document = new Document;
            $document->user_id = $user->id;
            $document->file = $file_name;
            $document->doc_type = $doc_type->id;
            $document->save();
        }

        $doc_types = DocumentType::where('institute',$user->institute)->where('institute_type',$user->institute_type)->get();
        $docs_uploaded = true;
        foreach($doc_types as $doc_type){
            $doc = Document::where('doc_type',$doc_type->id)->where('user_id',$user->id)->first();
            if($doc){
            }else{
                $docs_uploaded = false;
            }
        }
        if(\Auth::user()->documents_uploaded == 0 && $docs_uploaded == true){
            $user = \Auth::user();
            $user->documents_uploaded = 1;
            $user->inst_prf_completion = $user->inst_prf_completion + 25;
            $user->save();
        }
        // Session::flash('message', 'User Details Updated successfully!');
        // Session::flash('alert-class', 'alert-success');

        return redirect()->back();
    }

    public function updatePrograms(Request $request){
        $programs = $request->programs;
        $programs = explode(',',$programs);

        for($i = 0 ; $i < sizeof($programs) ; $i++){
            $inst_prg = InstituteProgram::where('program_id',$programs[$i])->first();
            $prg = Program::where('id',$programs[$i])->first();
            if($inst_prg){

            }else{
                $inst_prg = new InstituteProgram;
                $inst_prg->user_id = \Auth::user()->id;
                $inst_prg->program_id = $programs[$i];
                $inst_prg->discipline_id = $prg->discipline_id;

                $inst_prg->save();
            }
        }

        if(\Auth::user()->program_uploaded == 0){
            $user = \Auth::user();
            $user->program_uploaded = 1;
            $user->inst_prf_completion = $user->inst_prf_completion + 25;
            $user->save();
        }

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Programs added successfully.Please wait for admin approval!"
        ], 200);
    }
    public function editProfile(){
        $user = \Auth::user();
        return view('user-panels.admin-panel.users.editprofile',get_defined_vars());
    }
    public function updateProfile(Request $request){
        $data =$request->all();
        $user = \Auth::user();
        $user->update($data );
        return redirect()->back()->with(['success'=>'Profile Updated Successfully!']);
    }

  public function profile_avatar(Request $request)
  {
        $user = \Auth::user();
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
        return response()->json(['success'=>true]);
  }
   // change password
  public function chnagePassword(Request $request)
  {
        User::where('id',Auth::id())->update([
          'password' => Hash::make($request->confirm_password)
        ]);
      return redirect()->back()->with(['success'=>'Password Updated Successfully!']);
  }
}
