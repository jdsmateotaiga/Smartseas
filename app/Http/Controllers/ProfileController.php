<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\User;
use Crypt;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use App\Helpers\Helper;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $user = User::find(auth()->user()->id);
        return view('dashboard.profile.edit')->with('user', $user);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_decrypt_id = Helper::decrypt_id($id);
        if( auth()->user()->hasRole('admin') ) {
          $user = User::find($user_decrypt_id);
        } else {
          $user = User::where('id', $d_id)->where('active', '1')->first();
        }
        if ($user) {
          return view('dashboard.profile.show')->with('user', $user);
        } else {
          return response()->view('errors.404', [], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        if ( $request->get('profile-action') == 'basic-update') {

            $rules = array(
                'partner_admin_image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'partner_name'             => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect('profile')
                    ->withErrors($validator);
            } else {

                $user->partner_admin_ID = $request->get('partner_admin_ID');
                $user->partner_name = $request->get('partner_name');
                $user->partner_name_address = $request->get('partner_name_address');
                $user->partner_admin_name = $request->get('partner_admin_name');
                $user->partner_admin_address = $request->get('partner_admin_address');
                $user->partner_admin_gender = $request->get('partner_admin_gender');
                $user->partner_admin_position = $request->get('partner_admin_position');
                if ($request->hasFile('partner_admin_image')) {
                    $image = $request->file('partner_admin_image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('avatars');
                    $image->move($destinationPath, $name);
                    $user->partner_admin_image = '/public/avatars/' . $name;
                }
                $user->save();
                Session::flash('message', 'Successfully Updated!');
                return redirect('/profile');

            }
        } else {

            $rules = array(
                'old_password'     => 'required',
                'password'         => 'required:different:old_password',
                'password_confirm' => 'required|same:password'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect('profile')
                    ->withErrors($validator);

            } else {
                if (Hash::check($request->get('old_password'), $user->password)){
                    $user->password = Hash::make($request->get('password'));
                    $user->save();
                    Session::flash('message', 'Password Changed!');
                    return redirect('/profile');
                } else {
                    $validator->getMessageBag()->add('password', 'The specified password does not match the database password!.');
                    return redirect('/profile')->withErrors($validator);;
                }

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
