<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Auth;
use App\Helpers\Helper;

class UserManagementController extends Controller
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
    public function index(Request $request)
    {
      $users_select = new User;
      if(auth()->user()) {
          if( auth()->user()->hasRole('admin') ) {
              $users = $users_select->where('who_add_user_id', '!=', 0)
                    ->get();
          } else {
              $users = $users_select->where('who_add_user_id', auth()->user()->id)
                    ->get();
          }
      }
      return view('dashboard.usermanagement.index')
              ->with('users', $users);
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
        $d_id = Helper::decrypt_id($id);
        $user = User::find($d_id);

        // show the view and pass the nerd to it
        return view('dashboard.usermanagement.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $d_id = Helper::decrypt_id($id);
        $user = User::findOrFail($d_id);
        if ($request->get('action') == 'activate') {
            $user->active = 1;
        }
        else {
            $user->active = 0;
        }
        $user->update();
        return redirect('/user-management');
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
        $d_id = Helper::decrypt_id($id);
        $user = User::find($d_id);
        if( auth()->user()->hasRole('admin') || auth()->user()->hasRole('project_manager') ) {
          if( $user->who_add_user_id == auth()->user()->id || $user->who_add_user_id == 0 ) {
            $user->active = 0;
            $user->update();
            Session::flash('message', $user->name ." successfully deactivated!");
            return back();
          }
        }
    }
}
