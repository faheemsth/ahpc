<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Discipline;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Enums\UserRoleEnum;
use App\Models\Institute;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];


        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // $data = [ 
        //          'email'=>$request['email']
        //     ]; 
        //     $validator = validator($data); 
        //     if($validator->fails()){
        //         return back()->withErrors($validator)->withInput();
        //     }
        // dd($data);
        $institute_role = Role::where('name', UserRoleEnum::INSTITUTE)->pluck('id')->first();
        
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'avatar' =>  $avatarName,
            'first_name'=> $data['f_name'],
            'postel_address'=> $data['postel_address'],
            'tehsil'=> $data['tehsil'],
            'district'=> $data['district'],
            'province'=> $data['province'],
            'student_num'=> $data['student_num'],
            'doe'=> $data['doe'],
            'institute'=> $data['institute'],
            'institute_type'=> $data['institute_type'],

            'discipline'=> $data['discipline'],

            'ceo_name'=> $data['ceo_name'],
            'gender'=> $data['gender'],
            'cnic_no'=> $data['cnic_no'],
            'qualification'=> $data['qualification'],
            'website_url'=> $data['website_url'],
            'contact'=> $data['contact'],
            'declaration'=> $data['declaration'],
            'role_id'=> $institute_role,
            'inst_prf_completion'=> 50,
        ]);

        $dis_ids = explode(',',$data['discipline']);
        $total = Discipline::whereIn('id', $dis_ids)->sum('amount');
        $dis_name = Discipline::whereIn('id', $dis_ids)->pluck('discipline_name')->toArray();
        $dis_name = implode(',',$dis_name ); 

        // This code is to generate invoide id
        $num = 0;
        $inv = Invoice::latest()->first();
        
        if($inv){
            $num = $inv->id+1;
        }else{
            $num = 1;
        }

        $num = $this->getFiveDigitId($num);
        $num = substr($num, 0, -1);
        $invoice = new Invoice;
        $invoice->user_id = $user->id;
        $invoice->invoice_id = date("y").date("m").$num;
        $invoice->dis_ids = $data['discipline'];
        $invoice->disciplines = $dis_name;
        $invoice->total_amount = $total;
        $invoice->description = $dis_name;
        $invoice->save();

        return $user;
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

    public function validateName(){
        $name = $_GET['full_name'];

        $user = User::where('first_name', $name)->first();

        if($user){
            return json_encode([
                'status' => 'success',
                'message' => 'Institute name already exist'
            ]);
        }else{
            return json_encode([
                'status' => 'error'
            ]);
        }
     }
}
