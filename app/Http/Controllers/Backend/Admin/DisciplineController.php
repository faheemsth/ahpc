<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Institute;
use App\Models\InstituteType;
use App\Models\PolicyCategory;
use App\Models\Program;
use App\Models\ProgramPolicy;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $filter = [];

        $discipline_query = Discipline::with('programs');

        if (isset($_GET['institute']) && !empty($_GET['institute'])) {
            $discipline_query->where('institute', strtolower($_GET['institute']));
        }

        if (isset($_GET['institute_type']) && !empty($_GET['institute_type'])) {
            $discipline_query->where('institute_type', strtolower($_GET['institute_type']));
        }


        $disciplines = $discipline_query->orderBy('discipline_name', 'ASC')->get();


        $institute_types = InstituteType::all();
        $institutes = Institute::all();
        $policy_categories = PolicyCategory::all();

        return view('user-panels.admin-panel.disciplines.index', compact('disciplines', 'institute_types', 'institutes', 'policy_categories'));
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

        $discipline = Discipline::where('discipline_name', $request->discipline_name)->where('institute', $request->institute)->where('institute_type', $request->type)->first();
        if ($discipline) {
            return response()->json([
                'isSuccess' => true,
                'status_code' => 201,
                'Message' => "Discipline already exist!"
            ], 200);
        }
        $discipline = new Discipline;
        $discipline->discipline_name = $request->discipline_name;
        $discipline->amount = $request->amount;
        $discipline->institute = $request->institute;
        $discipline->institute_type = $request->type;
        $discipline->save();

        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Discipline added successfully!"
        ], 200);
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
    public function update(Request $request)
    {
        $discipline = Discipline::where('id', $request->id)->first();
        if ($discipline) {
            $discipline->discipline_name = $request->discipline_name;
            $discipline->amount = $request->amount;
            $discipline->save();
            return response()->json([
                'isSuccess' => true,
                'status_code' => 200,
                'Message' => "Discipline updated successfully!"
            ], 200);
        } else {
            return response()->json([
                'isSuccess' => true,
                'status_code' => 400,
                'Message' => "Discipline not found!"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeProgram(Request $request)
    {

       // dd($request->input());

        $program = Program::where('title', $request->title)->where('discipline_id', $request->discipline_id)->first();
        if ($program) {
            return response()->json([
                'isSuccess' => true,
                'status_code' => 201,
                'Message' => "Program already exist!"
            ], 200);
        }
        $program = new Program;
        $program->title = $request->title;
        $program->discipline_id = $request->discipline_id;
        $program->save();



        if (isset($request->policy_names) && !empty($request->policy_names)) {
            foreach ($request->policy_names as $key => $policy) {
                $name = $request->policy_names[$key];
                $value = $request->values[$key];
                $category_id = $request->policy_category[$key];
                $operator = $request->operators[$key];


                $new_policy = new ProgramPolicy();
                $new_policy->program_id = $program->id;
                $new_policy->discipline_id = $request->discipline_id;
                $new_policy->policy = $name;
                $new_policy->value = $value;
                $new_policy->policy_category_id = $category_id;
                $new_policy->operator = $operator;
                $new_policy->save();

            }
        }



        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Program added successfully!"
        ], 200);
    }

    public function editProgramTitle(Request $request)
{
    $id = $request->program_id;
    $policies = ProgramPolicy::where('program_id', $id)->get();
    $policy_categories = PolicyCategory::all();

    if ($policies && !$policies->isEmpty()) {
        $html = '';
        foreach ($policies as $key => $policy) {
            $html .= '<tr data-row-id="' . ($key + 1) . '">';
            $html .= '<td> <select name="policy_category[' . ($key + 1) . ']" id="" class="form form-control">';

            foreach ($policy_categories as $category) {
                $html .= '<option value="' . $category->id . '">' . $category->category . '</option>';
            }

            $html .= '</select></td>';
            $html .= ' <td><input type="text" class="form form-control" name="policy_names[' . ($key + 1) . ']" value="' . $policy->policy . '"></td>';
            $html .= '<td><input type="text" class="form form-control" name="operators[' . ($key + 1) . ']" value="' . $policy->operator . '"></td>';
            $html .= '<td><input type="text" class="form form-control" name="values[' . ($key + 1) . ']" value="' . $policy->value . '"></td>';
            $html .= '<td><button class="btn btn-sm btn-danger delete-policy" data-policy-id="'.$policy->id.'"><i class="fa fa-trash"></i></button></td>';
            $html .= '</tr>';
        }

        return json_encode([
            'status' => 'success',
            'html' => $html
        ]);
    } else {
        // Handle the case when there are no policies
        return json_encode([
            'status' => 'error'
        ]);
    }
}


    public function updateProgramTitle(Request $request)
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        //dd($request->input());


        $program_id = $_POST['program_id'];
        $program_title = $_POST['program_title'];

        Program::where('id', $program_id)->update(['title' => $program_title]);

        $program = Program::findOrFail($program_id);

        if (isset($request->policy_names) && !empty($request->policy_names)) {
            foreach ($request->policy_names as $key => $policy) {
                $name = $request->policy_names[$key];
                $value = $request->values[$key];
                $category_id = $request->policy_category[$key];
                $operator = $request->operators[$key];

                $is_exist_policy = ProgramPolicy::where(['program_id' => $program->id, 'discipline_id' => $program->discipline_id, 'policy' => $name])->first();

                // dd($is_exist_policy);

                if (empty($is_exist_policy)) {

                    $new_policy = new ProgramPolicy();
                    $new_policy->program_id = $program_id;
                    $new_policy->discipline_id = $program->discipline_id;
                    $new_policy->policy = $name;
                    $new_policy->value = $value;
                    $new_policy->policy_category_id = $category_id;
                    $new_policy->operator = $operator;
                    $new_policy->save();
                } else {
                    $is_exist_policy->policy = $name;
                    $is_exist_policy->value = $value;
                    $is_exist_policy->update();
                }
            }
        }


        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Program updated successfully!"
        ], 200);
    }

    public function deleteProgramTitle()
    {
        $program_id = $_GET['program_id'];

        Program::where('id', $program_id)->delete();


        return response()->json([
            'isSuccess' => true,
            'status_code' => 200,
            'Message' => "Program deleted successfully!"
        ], 200);
    }
}
