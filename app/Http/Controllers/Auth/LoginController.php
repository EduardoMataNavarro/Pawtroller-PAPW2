<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLogin']);
    }

    public function showLogin()
    {
        return view('pages.login-signup');
    }

    public function login(){
        
        $credentials = $this->validate(request(), [
            'name' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $login_type = filter_var(request()->input('name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nickname';

        request()->merge([
            $login_type => request()->input('name')
        ]);
        if(Auth::attempt(request()->only($login_type, 'password')))
        {
            return redirect()->route('home');
        }
         
        return back()->withErrors(['email' => trans('auth.failed')])->withInput(request(['name']));
    }

    /*
    use AuthenticatesUsers;
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*
    protected $redirectTo = '/home';
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    */
}
