<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->emtype == 1){
            $this->redirectTo = route('dashboard');
        } elseif(Auth::check() && Auth::user()->emtype == 0){
            $this->redirectTo = route('user_dashboard');
        }

        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // $credentials = $request->only('phonenumber', 'password');
        $credentials = ['phonenumber' => $request->phonenumber, 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            if (auth::check() && Auth::user()->emtype == 1) {
                // return redirect()->intended('dashboard')->withSuccess('Signed in');
                return redirect()->route('dashboard')->withSuccess('Signed in');
            } else if (auth::check() && Auth::user()->emtype == 0) {
                // return redirect()->intended('user_dashboard')->withSuccess('Signed in');
                return redirect()->route('user_dashboard')->withSuccess('Signed in');
            }
        } else {
            return redirect()->route('getlogin')->with('error', 'PhoneNumber And Password Are Wrong.');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('getlogin');
    }
}
