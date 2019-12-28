<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Helper;
use App\Role;
use App\Notification;
use Session;
use Auth;
use App\Mail\Credentials;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['roles']);
    }

    public function showRegistrationForm() {
        $roles = Role::all();
        return view('auth.register')->with('roles', $roles);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'partner_name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'partner_code' => 'required|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email'                    => $data['email'],
            'who_add_user_id'          => Helper::decrypt_id($data['who_add_user_id']),
            'password'                 => Hash::make($data['password']),
            'partner_code'             => strtoupper($data['partner_code']),
            'partner_name'             => $data['partner_name'],
            'partner_admin_image'      => '/assets/static/images/user.png',
            'partner_admin_name'       => $data['partner_admin_name'],
            'partner_admin_position'   => $data['partner_admin_position']
        ]);
        $user->roles()->attach(Role::where('name', $data['role'])->first());
        return $user;

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $email     = $request->input('email');
        $password  = $request->input('password');
        $partner_name  = $request->input('partner_name');

        $users = User::all();

        foreach($users as $user) {
            $notification = new Notification;
            $notification->to_user_id = $user->id;
            $notification->user_id    = auth()->user()->id;
            $notification->body       = ucwords($partner_name) . ' has been added';
            $notification->save();
        }

        event(new Registered($user = $this->create($request->all())));


        Session::flash('message', $partner_name .' Successfully registered! Email: '. $email. ' Password: '. $password. '' );
        return redirect('/register');
    }

}
