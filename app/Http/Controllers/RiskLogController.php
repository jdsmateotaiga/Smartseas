<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RiskLog;
use Helper;

class RiskLogController extends Controller
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
        $risklog = new RiskLog;

        $project_id = Helper::decrypt_id($request->input('project_id'));

        $risklog->user_id = Auth()->user()->id;
        $risklog->project_id = $project_id;
        $risklog->description = $request->input('description');
        $risklog->date_identified = $request->input('date_identified');
        $risklog->type = $request->input('type');
        $risklog->response = $request->input('response');
        $risklog->owner = $request->input('owner');
        $risklog->submitted_by = $request->input('submitted_by');
        $risklog->last_update = $request->input('last_update');
        $risklog->status = $request->input('status');
        $risk_level = [];
        for($i = 0; $i < $request->input('risk-count'); $i++) {
            if( ( $request->input('risk-year-'.$i) != null ) ) {
               array_push($risk_level, $request->input('risk-year-'.$i).'-'.$request->input('risk-level-'.$i));
            }
        }
        $risklog->risk_level = implode(",", $risk_level);
        $risklog->save();

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
        $risk_log_decrypt_id = Helper::decrypt_id($id);
        $risklog = RiskLog::find($risk_log_decrypt_id);
        return response()->json($risklog);
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
        

        $risklog_id = Helper::decrypt_id($id);
        $risklog = RiskLog::find($risklog_id);
     
        $risklog->description = $request->input('description');
        $risklog->date_identified = $request->input('date_identified');
        $risklog->type = $request->input('type');
        $risklog->response = $request->input('response');
        $risklog->owner = $request->input('owner');
        $risklog->submitted_by = $request->input('submitted_by');
        $risklog->last_update = $request->input('last_update');
        $risklog->status = $request->input('status');
        $risk_level = [];
        for($i = 0; $i < $request->input('risk-count'); $i++) {
            if( ( $request->input('risk-year-'.$i) != null ) ) {
               array_push($risk_level, $request->input('risk-year-'.$i).'-'.$request->input('risk-level-'.$i));
            }
        }
        $risklog->risk_level = implode(",", $risk_level);
        $risklog->update();

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
    }

    public function deactivate($id)
    {
      return Helper::deactivate(RiskLog::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(RiskLog::class, $id);
    }
}
