<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;



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
        //added to overwrite the login credentials
        public function authenticated()
        {
            ActivityController::loginActivity();
            
            if (!Auth::user()->is_active) {
                Auth::logout();
                
                return redirect('login')->withErrors(['Your account is inactive']);
            }
        }
        public function logout(Request $request)
        {
            ActivityController::logoutActivity();
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/');
        }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
