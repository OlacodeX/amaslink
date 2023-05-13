<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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

    public function username()
    {
        $login = request()->input('identity');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'u_name';
        request()->merge([$field => $login]);
        return $field;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    
    public function redirectTo()
    {if (! Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role == 1) {
        return redirect()->route('superadmin');
    }


    if (Auth::user()->role == 2) {
        return redirect()->route('dashboard');
    }

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
