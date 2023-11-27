<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    
  public function login(Request $request)
  {
    // return $request;

    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    // $remember = ($request->remember == 'on') ? true : false;
    $user = User::where('email', $request->email)->first();    
    
    if ($user) {
      if (Auth::attempt($credentials, $request->has('remember'))) {
        if($user->role_id == 2){
            if($user->inst_prf_completion < 100){
                return redirect()->intended('institute_profile');
            }else{
                return redirect()->intended('dashboard');
            }
        }else{
            return redirect()->intended('dashboard');
        }
      } else {
        return back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
      }
    } else {
      return back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
    }

  }
}
