<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use App\Models\FeeStructure;
use App\Models\Institute;
use App\Models\InstituteType;
use App\Models\OverseasDocumentType;
use App\Models\PolicyCategory;
use App\Models\ProgramPolicy;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $doc_types = DocumentType::all();
        $institutes = Institute::all();
        $institute_types = InstituteType::all();
        $disciplines = Discipline::all();
        $categories = PolicyCategory::all();
        $blogs = Blogs::all();
        $overseasdocumenttypes = OverseasDocumentType::get();
        $FeeStructures = FeeStructure::get();

        return view('user-panels.admin-panel.settings.index', compact('FeeStructures','doc_types', 'institutes', 'institute_types', 'disciplines', 'categories', 'blogs', 'overseasdocumenttypes'));
    }

    public function storeDocType(Request $request)
    {
        $doc_type = DocumentType::where('title', $request->title)->where('institute', $request->institute_type)->where('institute', $request->institute_type)->first();
        if ($doc_type) {
            return response()->json([
                'isSuccess' => true,
                'status_code' => 201,
                'Message' => "Document Type already exist!"
            ], 200);
        }
        $doc_type = new DocumentType;
        $doc_type->title = $request->title;
        $doc_type->institute = $request->institute;
        $doc_type->institute_type = $request->institute_type;
        $doc_type->save();

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Document Type added successfully!"
        ], 200);
    }

    public function saveInstitute(Request $request)
    {
        // dd($request->input());

        if (isset($_POST['add_btn'])) {
            $title = $request->input('name');
            $institute = new Institute();
            $institute->name = $title;
            $institute->save();

            return redirect('institutes/show?id=institute')->with('message', 'Institute added successfully!');
        } else {

            $id = $request->input('id');
            $name = $request->input('name');
            Institute::where('id', $id)->update(['name' => $name]);
            return redirect('institutes/show?id=institute')->with('message', 'Institute updated successfully!');
        }
    }

    public function deleteInstitute()
    {
        $id = $_GET['id'];
        Institute::where('id', $id)->delete();
        return redirect('institutes/show?id=institute')->with('message', 'Institute deleted successfully!');
    }


    public function saveInstituteType(Request $request)
    {
        if (isset($_POST['add_btn'])) {
            $type_v = $request->input('type');
            $type = new InstituteType();
            $type->type = $type_v;
            $type->save();

            return redirect('institutes/show?id=institute-type')->with('message', 'Institute type added successfully!');
        } else {

            $id = $request->input('id');
            $type = $request->input('type');
            InstituteType::where('id', $id)->update(['type' => $type]);
            return redirect('institutes/show?id=institute-type')->with('message', 'Institute type updated successfully!');
        }
    }

    public function deleteInstituteType()
    {
        $id = $_GET['id'];
        InstituteType::where('id', $id)->delete();
        return redirect('institutes/show?id=institute-type')->with('message', 'Institute type deleted successfully!');
    }

    public function saveOverseasDocumentType(Request $request){

        if (isset($_POST['add_btn'])) {
            $type_v = $request->input('name');
            $type = new OverseasDocumentType();
            $type->type = $type_v;
            $type->fee = $request->input('fee');
            $type->save();

            return redirect('overseas/show?id=overseas-type')->with('message', 'Overseas document type added successfully!');

        } else {

            $id = $request->input('id');
            $type = $request->input('name');
            OverseasDocumentType::where('id', $id)->update(['type' => $type,'fee' => $request->input('fee')]);
            return redirect('overseas/show?id=overseas-type')->with('message', 'Overseas document type updated successfully!');
        }
    }



    public function deleteOverseasDocumentType()
    {
        $id = $_GET['id'];
        OverseasDocumentType::where('id', $id)->delete();
        return redirect('overseas/show?id=overseas-type')->with('message', 'Overseas document type deleted successfully!');
    }


    public function editDiscipline(Request $request)
    {

        $id = $request->input('id');
        $amount = $request->input('amount');
        $type = $request->input('institute_type');
        $institute = $request->input('institute');

        Discipline::where('id', $id)->update(['amount' => $amount, 'institute_type' => $type, 'institute' => $institute]);
        return redirect('institutes/show?id=discipline-fee')->with('message', 'Discipline updated successfully!');
    }

    public function getdiscipline()
    {
        $institute = $_GET['institute'];
        $type = $_GET['type'];

        $disciplines = Discipline::where(['institute' => $institute, 'institute_type' => $type])->get();
        // echo "<pre>";
        // print_r($discipline);
        // die();
        if ($disciplines->isNotEmpty()) {
            return json_encode([
                'status' => 'success',
                'data' => $disciplines
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'No disciplines found for the given institute and type.'
            ]);
        }
    }

    public function editDisciplineAmount(Request $request)
    {
        Discipline::where('id', $request->discipline_id)->update(['amount' => $request->amount]);
        return redirect('institutes/show?id=discipline-fee')->with('message', 'Discipline updated successfully!');
    }

    public function deleteDiscipline(Request $request)
    {
        Discipline::where('id', $request->id)->delete();
        return redirect('institutes/show?id=discipline-fee')->with('message', 'Discipline delete successfully!');
    }



    public function addPolicyCategory(Request $request)
    {

        $category = $request->category;
        if (isset($_POST['update_btn'])) {

            $id = $request->category_id;
            $category = $request->category;
            PolicyCategory::where(['id' => $id])->update(['category' => $category]);
            return redirect('settings?id=policy-category')->with('success', 'Policy category updated successfully!');
        } else {
            $is_exist = PolicyCategory::where('category', $category)->first();
            if ($is_exist) {
                return redirect('settings?id=policy-category')->with('message', 'Policy category already exist');
            }

            $new_policy = new PolicyCategory();
            $new_policy->category = $category;
            $new_policy->save();

            return redirect('settings?id=policy-category')->with('message', 'Policy category added successfully!');
        }
    }

    public function deletePolicyCategory()
    {
        $id = $_GET['id'];
        PolicyCategory::where('id', $id)->delete();
        return redirect('settings?id=policy-category')->with('success', 'Policy category deleted successfully!');
    }

    public function deleteProgramPolicy()
    {
        $id = $_GET['id'];
        ProgramPolicy::where('id', $id)->delete();
        return json_encode([
            'status' => 'success',
            'message' => 'Policy deleted successfully!'
        ]);
    }
    public function storeFeeStructure(Request $request)
    {
        $editMode = !empty($request->input('edit'));

        $FeeStructure = $editMode ? FeeStructure::find($request->input('edit')) : new FeeStructure();
        $FeeStructure->role_id = Auth::user()->role_id;
        $FeeStructure->cdd = $request->input('cdd');
        $FeeStructure->fee = $request->input('fee');
        $FeeStructure->currency = $request->input('currency');
        $FeeStructure->save();

        return response()->json(['status' => 'success']);
    }


}
