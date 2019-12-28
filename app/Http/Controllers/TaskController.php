<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Outcome;
use App\Output;
use App\Activity;
use App\Notification;
use App\Task;
use App\User;
use Helper;
use Auth;
use Validator;



class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules = [
          'title'              => 'required',
          'partner_id'         => 'required',
          'project_id'         => 'required',
          'outcome_id'         => 'required',
          'activity_id'        => 'required',
          'output_id'          => 'required',
          'fund_source'        => 'required',
          'code_id'            => 'required',
          'amount'             => 'required',
          'status'             => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            echo 'failed';
        } else {
          $partner_id = Helper::decrypt_id($request->input('partner_id'));
          $project_id = Helper::decrypt_id($request->input('project_id'));
          $outcome_id = Helper::decrypt_id($request->input('outcome_id'));
          $output_id  = Helper::decrypt_id($request->input('output_id'));
          $activity_id = Helper::decrypt_id($request->input('activity_id'));

          $task = new Task;
          $task->user_id              = auth()->user()->id;
          $task->partner_id           = $partner_id;
          $task->project_id           = $project_id;
          $task->outcome_id           = $outcome_id;
          $task->output_id            = $output_id;
          $task->activity_id          = $activity_id;
          $task->title                = $request->input('title');
          $task->deliverables         = $request->input('deliverables');
          $task->fund_source          = $request->input('fund_source');
          $task->code_id              = $request->input('code_id');
          $task->amount               = $request->input('amount');
          $task->status               = $request->input('status');


          $timeline = [];
          for($i = 1; $i <= 4; $i++) {
            if (  array_key_exists('q-'.$i, $request->all()) ) {
                array_push($timeline, $request->input('q-'.$i));
            }
          }

          $task->timeline             = implode(",", $timeline);
          $task->unit_measurement     = $request->input('unit_measurement');

          $month = [];
          for($i = 1; $i <= 12; $i++) {
            if (  array_key_exists('m-'.$i, $request->all()) ) {
                array_push($month, $request->input('m-'.$i));
            }
          }

          $task->month                = implode(",", $month);

          $task->save();

          $notification = new Notification;
          $user = User::find($partner_id);
          $activity = Activity::find($activity_id);
          $notification->user_id = auth()->user()->id;
          $notification->to_user_id = $partner_id;
          $notification->body = auth()->user()->partner_name .' added '. $request->input('title') .' in activity '. $activity->title .'';
          if($user->hasRole('partner')) {
            $notification->url = '/project/outcome/partner/'. $request->input('outcome_id');
          } else {
            $notification->url = '/project/outcome/'. $request->input('outcome_id');
          }
          $notification->save();

          return back();
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
        $task_decrypt_id = Helper::decrypt_id($id);
        $task = Task::find($task_decrypt_id);
        return response()->json($task);
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
        $rules = [
            'title'              => 'required',
            'partner_id'         => 'required',
            'fund_source'        => 'required',
            'code_id'               => 'required',
            'amount'             => 'required',
            'status'             => 'required'
          ];
          $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
              echo 'failed';
          } else {
            $decrypt_task_id = Helper::decrypt_id($id);
            $task = Task::find($decrypt_task_id);

            $partners = explode(',', $task->project->partners);
            if(in_array($request->input('partner_id'), $partners)) {
                $task->partner_id       = $request->input('partner_id');
            } else {
                $task->partner_id       = $task->partner_id;
            }
            $task->title                = $request->input('title');
            $task->deliverables         = $request->input('deliverables');
            $task->fund_source          = $request->input('fund_source');
            $task->code_id              = $request->input('code_id');
            $task->amount               = $request->input('amount');
            $task->status               = $request->input('status');
            $timeline = [];
            for($i = 1; $i <= 4; $i++) {
              if (  array_key_exists('q-'.$i, $request->all()) ) {
                  array_push($timeline, $request->input('q-'.$i));
              }
            }
            $task->timeline             = implode(",", $timeline);
            $task->unit_measurement     = $request->input('unit_measurement');

            $month = [];
            for($i = 1; $i <= 12; $i++) {
              if (  array_key_exists('m-'.$i, $request->all()) ) {
                  array_push($month, $request->input('m-'.$i));
              }
            }

            $task->month                = implode(",", $month);
            if(auth()->user()->id == $task->user_id || auth()->user()->hasRole('admin')) {
                $task->update();
            }
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

    /*
    Partner update
    */

    public function updateTaskByPartner(Request $request, $id)
    {
      $rules = [
        'progress' => 'required|max:100|min:1'
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
          return response()->json('error');
      } else {

          $task_decrypt_id = Helper::decrypt_id($id);
          $task = Task::find($task_decrypt_id);
          if($task->partner_id == auth()->user()->id || auth()->user()->hasRole('admin') || auth()->user()->hasRole('project_manager') ) {
            $task->progress = $request->input('progress');
            $task->update();
            return response()->json('success');
         }
      }
    }

    public function deactivate($id)
    {
      return Helper::deactivate(Task::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(Task::class, $id);
    }

}
