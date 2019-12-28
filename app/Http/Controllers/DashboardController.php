<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    // public function get_user_count() {
    //     $user = User::all()->count;
    //     return $user;
    // }

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

      $users_select = new User;
      if(auth()->user()) {
          if( auth()->user()->hasRole('admin') ) {
              $users = $users_select->where('who_add_user_id', '!=', 0)
                    ->get();
              $projects = Project::all();
          } else if( auth()->user()->hasRole('project_manager') ){
              $users = $users_select->where('who_add_user_id', auth()->user()->id)
                    ->where('active', '1')
                    ->get();
              $projects = Project::where('user_id', auth()->user()->id)
                    ->where('active', '1')
                    ->get();
          } else {
              $users = null;
              $user_id = auth()->user()->id;
              $projects = Project::where('partners', 'like', '%'.$user_id.'%')
                      ->where('active', '1')
                      ->get();
          }
      }

      return view('dashboard.index')
            ->with('users', $users)
            ->with('projects', $projects);
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
