<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressReport;
use App\User;
use Helper;
use Validator;

class ProgressReportController extends Controller
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
        $rules = [
          'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
          return response()->json($validator->messages(), 200);
        } else {
          $progress_report = new ProgressReport;
          $progress_report->project_id = Helper::decrypt_id($request->input('project_id'));
          $progress_report->user_id = auth()->user()->id;
          $progress_report->title = $request->input('title');
          $progress_report->reporting_date = $request->input('reporting_date');
          $progress_report->results = $request->input('results');
          $progress_report->technical_accomplishments = $request->input('technical_accomplishments');
          $progress_report->save();
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
        $decrypt_id_progress_report = Helper::decrypt_id($id);
        $progress_report = ProgressReport::find($decrypt_id_progress_report);
        $partners = explode(',', $progress_report->project->partners);
        $users = User::find($partners);
        return view('dashboard.project.progress-report.show')
              ->with('progress_report', $progress_report)
              ->with('users', $users);
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
        $decrypt_id_progress_report = Helper::decrypt_id($id);
        $progress_report = ProgressReport::find($decrypt_id_progress_report);
        return response()->json($progress_report);
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
          'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
          return response()->json($validator->messages(), 200);
        } else {
          $progress_report_decrypt_id = Helper::decrypt_id($id);
          $progress_report = ProgressReport::find($progress_report_decrypt_id);
          $progress_report->title = $request->input('title');
          $progress_report->reporting_date = $request->input('reporting_date');
          $progress_report->results = $request->input('results');
          $progress_report->technical_accomplishments = $request->input('technical_accomplishments');
          if(auth()->user()->id == $progress_report->user_id || auth()->user()->hasRole('admin')) {
              $progress_report->update();
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

    public function deactivate($id)
    {
      return Helper::deactivate(ProgressReport::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(ProgressReport::class, $id);
    }

}
