<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressReportActivity;
use Auth;
use Helper;

class ProgressReportActivityController extends Controller
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
        //
        $progress_report_activity = new ProgressReportActivity;
        $progress_report_activity->user_id           = auth()->user()->id;
        $progress_report_activity->project_id        = Helper::decrypt_id($request->input('project_id'));
        $progress_report_activity->outcome_id        = Helper::decrypt_id($request->input('outcome_id'));
        $progress_report_activity->output_id         = Helper::decrypt_id($request->input('output_id'));
        $progress_report_activity->activity_id       = Helper::decrypt_id($request->input('activity_id'));
        $progress_report_activity->status            = $request->input('status');
        $progress_report_activity->accomplishment    = $request->input('accomplishment');
        $progress_report_activity->challenges        = $request->input('challenges');
        $progress_report_activity->save();
        return back();

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
        $progress_report_activity = ProgressReportActivity::find(Helper::decrypt_id($id));
        return response()->json($progress_report_activity);
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
        $progress_report_activity =  ProgressReportActivity::find(Helper::decrypt_id($id));
        $progress_report_activity->status            = $request->input('status');
        $progress_report_activity->accomplishment    = $request->input('accomplishment');
        $progress_report_activity->challenges        = $request->input('challenges');
        $progress_report_activity->update();
        return back();
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
        $progress_report_activity =  ProgressReportActivity::find(Helper::decrypt_id($id));
        $progress_report_activity->delete();
        return back();
    }
}
