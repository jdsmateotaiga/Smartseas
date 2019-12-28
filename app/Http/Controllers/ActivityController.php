<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;
use App\BudgetCode;
use App\UnitMeasurement;
use Auth;
use Validator;
use Helper;
use Session;

class ActivityController extends Controller
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

        $rules = array(
            'title'    =>  'required',
            'deliverables' => 'required',
            'start_date'      =>  'required',
            'end_date'        =>  'required'
        );

        $messages = [
            'title.required'     => 'The Activity Title field is required.',
            'deliverables.required'     => 'The Activity Deliverables field is required.',
            'start_date.required'       => 'The start date field is required.',
            'end_date.required'         => 'The completion date is is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back();
        } else {
            $sprint = new Activity;
            $sprint->user_id              = auth()->user()->id;
            $sprint->project_id           = Helper::decrypt_id($request->input('project_id'));
            $sprint->outcome_id           = Helper::decrypt_id($request->input('outcome_id'));
            $sprint->output_id             = Helper::decrypt_id($request->input('output_id'));
            $sprint->title                = $request->input('title');
            $sprint->description          = $request->input('description');
            $sprint->deliverables         = $request->input('deliverables');
            $sprint->start_date           = $request->input('start_date');
            $sprint->end_date             = $request->input('end_date');
            $sprint->save();
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
        $view = 'dashboard.project.activity.show';
        return $this->showActivity($id, $view);
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
        $activity_decrypt_id = Helper::decrypt_id($id);
        $activity = Activity::find($activity_decrypt_id);
        return response()->json($activity);
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
        $rules = array(
            'title'    =>  'required',
            'deliverables' => 'required',
            'start_date'      =>  'required',
            'end_date'        =>  'required'
        );

        $messages = [
            'title.required'     => 'The Activity Title field is required.',
            'deliverables.required'     => 'The Activity Deliverables field is required.',
            'start_date.required'       => 'The start date field is required.',
            'end_date.required'         => 'The completion date is is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back();
        } else {
            $sprint_decrypt_id = Helper::decrypt_id($id);
            $sprint            = Activity::find($sprint_decrypt_id);
            $sprint->title                = $request->input('title');
            $sprint->description          = $request->input('description');
            $sprint->deliverables         = $request->input('deliverables');
            $sprint->start_date           = $request->input('start_date');
            $sprint->end_date             = $request->input('end_date');
            $sprint->update();
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

    public function deactivate($id)
    {
      return Helper::deactivate(Activity::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(Activity::class, $id);
    }

    public function showActivity($id, $view) {
      $activity_decrypt_id = Helper::decrypt_id($id);
      $code = BudgetCode::all();
      $unit_measurement = UnitMeasurement::all();
      if(auth()->user()->hasRole('admin')) {
          $activity = Activity::find($activity_decrypt_id);
          $project = $activity->project;
          $partner_users = explode(',', $project->partners);
          $users = User::find($partner_users);
          return view($view)
                ->with('activity', $activity)
                ->with('users', $users)
                ->with('code', $code)
                ->with('unit_measurement', $unit_measurement);
      } else {
          $activity = Activity::where('id', $activity_decrypt_id)->where('active', 1)->first();
          if($activity) {
            $project = $activity->project;
            $partner_users = explode(',', $project->partners);
            $users = User::find($partner_users);
            return view($view)
                  ->with('activity', $activity)
                  ->with('users', $users)
                  ->with('code', $code);
          } else {
            return response()->view('errors.404', [], 404);
          }
      }
    }

    public function partnerShowActivity($id) {
      $view = 'dashboard.project.activity.show';
      return $this->showActivity($id, $view);
    }
}
