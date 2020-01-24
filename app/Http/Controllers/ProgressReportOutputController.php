<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Helper;
use App\ProgressReportOutput;

class ProgressReportOutputController extends Controller
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
          'indicator'           => 'required',
          'year'                => 'required',
          'baseline'            => 'required',
          'quarter_milestone'   => 'required',
          'annual_target'       => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
          return response()->json($validator->messages(), 200);
        } else {
          $progress_report_output = new ProgressReportOutput;
          $progress_report_output->user_id = auth()->user()->id;
          $progress_report_output->project_id = Helper::decrypt_id($request->input('project_id'));
          $progress_report_output->progress_report_id = Helper::decrypt_id($request->input('progress_report_id'));
          $progress_report_output->outcome_id = Helper::decrypt_id($request->input('outcome_id'));
          $progress_report_output->output_id = Helper::decrypt_id($request->input('output_id'));
          $progress_report_output->indicator = $request->input('indicator');
          $progress_report_output->year = $request->input('year');
          $progress_report_output->baseline = $request->input('baseline');
          $progress_report_output->quarter_milestone = $request->input('quarter_milestone');
          $progress_report_output->annual_target = $request->input('annual_target');
          $progress_report_output->save();
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
        $progress_report_output_decrypt_id = Helper::decrypt_id($id);
        $progress_report_output = ProgressReportOutput::find($progress_report_output_decrypt_id);
        return response()->json($progress_report_output);
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
        $rules = [
          'indicator'           => 'required',
          'year'                => 'required',
          'baseline'            => 'required',
          'quarter_milestone'   => 'required',
          'annual_target'       => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
          return response()->json($validator->messages(), 200);
        } else {
          $progress_report_output = ProgressReportOutput::find(Helper::decrypt_id($id));
          $progress_report_output->indicator = $request->input('indicator');
          $progress_report_output->year = $request->input('year');
          $progress_report_output->baseline = $request->input('baseline');
          $progress_report_output->quarter_milestone = $request->input('quarter_milestone');
          $progress_report_output->annual_target = $request->input('annual_target');
          $progress_report_output->update();
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
        $progress_report_output = ProgressReportOutput::find(Helper::decrypt_id($id));
        $progress_report_output->delete();
        return back();
    }
}
