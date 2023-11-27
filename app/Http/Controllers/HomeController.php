<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Invoice;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        $user = \Auth::user();
        if($user->role_id == 2 && $user->inst_prf_completion < 100){
            Session::flash('message', 'Your Profile is still '.$user->inst_prf_completion.'% pending.');
            Session::flash('alert-class', 'alert-warning');
            return redirect()->intended('institute_profile');
        }else if($user->role_id == 3 && $user->inst_prf_completion < 100){
            Session::flash('message', 'Your Profile is still '.$user->inst_prf_completion.'% pending.');
            Session::flash('alert-class', 'alert-warning');
            return redirect()->intended('overseas_profile');
        }

        $institutes = User::where('role_id', 2)->get();
        $approved_inst_count = User::where('role_id',2)->where('inst_approval_status',4)->count();
        $total_earnings = Invoice::where('invoice_status',1)->sum('total_amount');


        $pending_institute = User::where('inst_approval_status', '!=', 4)
        ->where('role_id', 2)
        ->count();


        //count AHPC
        $total_overseas = User::where('role_id', 3)->count();
        $overseas = User::where('role_id', 3)->get();

        $total_ahpcs = User::where('role_id', 4)->count();
        $ahpcs = User::where('role_id', 4)->get();

        return view('index',compact('total_ahpcs','ahpcs','institutes','approved_inst_count','total_earnings', 'total_overseas', 'overseas', 'pending_institute'));
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }

    public function getInvoices($id){
        $invoices = Invoice::where('user_id',$id)->get();
        return response()->json([
            'isSuccess' => true,
            'Message' => "Invoices List",
            "data" => $invoices
        ], 200);
    }

    public function invoice($id)
    {
        $invoice = Invoice::with('user')->where('id',$id)->first();
        view()->share('invoice',$invoice);
        $pdf = PDF::loadView('user-panels.dashboard.invoice');
         return $pdf->download('invoice.pdf');
    }

    public function overseas_invoice($id)
    {
        $invoice = Invoice::with('user')->where('id',$id)->first();
        view()->share('invoice',$invoice);
        $pdf = PDF::loadView('user-panels.overseas.invoice');
         return $pdf->download('overseas_invoice.pdf');
    }

}
