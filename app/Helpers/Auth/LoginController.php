<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
         //return $request->only($this->username(), 'password');
         return ['email' => $request->input('identity'), 'password' => $request->input('password'), 'active' => 1];
    }

    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'identity'          => 'required|string',
                'password'          => 'required|string',
            ],
            [
                'identity.required' => 'Username or email is required',
                'password.required' => 'Password is required',
            ]
        );
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
        ->withInput()
        ->withErrors(array('message' => 'Login field is required.'));

    }


    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('/login');
    }
}
