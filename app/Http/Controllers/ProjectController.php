<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Notification;
use Session;
use Validator;
use DB;
use Auth;
use Helper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

        $p_model = Project::with('activities', 'tasks', 'owner', 'outcomes', 'outcome', 'outputs')->orderBy('id', 'DESC');
        if( auth()->user()->hasRole('admin') ) {

            if(isset($_GET['start_date']) && isset($_GET['end_date']) ) {

                $projects =  $p_model->where('start_date', '=', $start_date)
                        ->where('completion_date', '=', $end_date)
                        ->get();

            } elseif(isset($_GET['start_date'])) {

                $projects =  $p_model->orWhere('start_date', '=', $start_date)
                        ->get();

            } elseif(isset($_GET['end_date'])) {

                $projects =  $p_model->orWhere('completion_date', '=', $end_date)
                        ->get();

            } else {

                $projects =  $p_model->get();
            }

        } else {
            $projects = $p_model->where('user_id', auth()->user()->id)
                      ->where('active', 1)
                      ->orderBy('id', 'DESC')
                      ->get();
        }
        return view('dashboard.project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.project.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $rules = array(
            'title'           =>  'required',
            'project_id'      =>  'required|unique:projects',
            'award_id'        =>  'required|unique:projects',
            'start_date'      =>  'required',
            'completion_date' =>  'required'
        );
        $messages = [
            'title.required'          => 'The Title field is required.',
            'project_id.required'     => 'The Project ID field is required.',
            'project_id.unique'       => 'The Project ID is already used.',
            'award_id.required'       => 'The Award ID field is required.',
            'award_id.unique'         => 'The Award ID is already used.',
            'start_date.required'     => 'The Start Date is required.',
            'completion_date.required'         => 'The Completion Date is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $project = new Project;
            $project->user_id = auth()->user()->id;
            $project->title = $request->input('title');
            $project->project_id = $request->input('project_id');
            $project->award_id = $request->input('award_id');
            $project->start_date = $request->input('start_date');
            $project->completion_date = $request->input('completion_date');
            $project->implementing_partner = $request->input('implementing_partner');
            $project->objective = $request->input('objective');
            $partners = [];
            for($i = 1; $i <= $request->input('responsibe_user_count'); $i++) {
                if (  array_key_exists('partner-'.$i, $request->all()) ) {
                    array_push($partners, Helper::decrypt_id($request->input('partner-'.$i)));
                }
            }
            $project->partners = implode(",", $partners);
            $project->save();
            foreach($partners as $partner) {
              $notification = new Notification;
              $user = User::find($partner);
              $notification->user_id = auth()->user()->id;
              $notification->to_user_id = $partner;
              $notification->body = 'You has been added in new project "'. $request->input('title') .'"';
              if($user->hasRole('partner')) {
                 $notification->url = '/project/partner/'. Helper::encrypt_id($project->id);
              } else {
                 $notification->url = '/project/'. Helper::encrypt_id($project->id);
              }
              $notification->save();
            }

            return redirect('project');
        }
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
        $view = 'dashboard.project.show';
        return $this->showProject($id, $view);

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
        $project_decypt_id = Helper::decrypt_id($id);
        $project = Project::find($project_decypt_id);
        $users = User::all();
        return view('dashboard.project.edit')
                ->with('project', $project)
                ->with('users', $users);

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
        $rules = array(
            'title'   =>  'required',
            'project_id'      =>  'required',
            'award_id'        =>  'required'
        );
        $messages = [
            'title.required'  => 'The Title field is required.',
            'project_id.required'     => 'The Project ID field is required.',
            'award_id.required'       => 'The Award ID field is required.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();;
        } else {
            $project_decrypt_id = Helper::decrypt_id($id);
            $project = Project::find($project_decrypt_id);
            $project->user_id = auth()->user()->id;
            $project->title = $request->input('title');
            $project->project_id = $request->input('project_id');
            $project->award_id = $request->input('award_id');
            $project->start_date = $request->input('start_date');
            $project->completion_date = $request->input('completion_date');
            $project->implementing_partner = $request->input('implementing_partner');
            $project->objective = $request->input('objective');
            $partners = [];
            for($i = 1; $i <= $request->input('responsibe_user_count'); $i++) {
                if (  array_key_exists('partner-'.$i, $request->all()) ) {
                    array_push($partners, Helper::decrypt_id($request->input('partner-'.$i)));
                }
            }
            $project->partners = implode(",", $partners);
            $project->update();
            return back();
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

    public function activate($id)
    {
      return Helper::activate(Project::class, $id);
    }

    public function deactivate($id)
    {
      return Helper::deactivate(Project::class, $id);
    }



    public function showProject($id, $view) {

        $project_decrypt_id = Helper::decrypt_id($id);
        $project_temp = Project::with('owner')->where('id', $project_decrypt_id);
        if(auth()->user()->hasRole('admin')) {

          $project =  $project_temp->first();
          $partners = explode(',', $project->partners);
          $users = User::find($partners);
          return view($view)
                  ->with('project', $project)
                  ->with('users', $users);

        } else {
            $project =  $project_temp->where('active', 1)->first();
            if($project) {
                $partners = explode(',', $project->partners);
                $users = User::find($partners);
                return view($view)
                        ->with('project', $project)
                        ->with('users', $users);
            } else {
                return response()->view('errors.404', [], 404);
            }
        }
    }

    /**
      Partner Project
    */
    public function partnerShowProject($id) {
        $view = 'dashboard.project.show';
        return $this->showProject($id, $view);
    }
}
