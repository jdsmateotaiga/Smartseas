<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressReportPartnershipForged;
use Helper;

class ProgressReportPartnershipForgedController extends Controller
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
        $partnership_forged = new ProgressReportPartnershipForged;
        $partnership_forged->user_id     = auth()->user()->id;
        $partnership_forged->project_id  = Helper::decrypt_id($request->input('project_id'));
        $partnership_forged->progress_report_id  = Helper::decrypt_id($request->input('progress_report_id'));
        $partnership_forged->name = $request->input('name');
        $partnership_forged->type = $request->input('type');
        $partnership_forged->description = $request->input('description');
        $partnership_forged->save();
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
        $partnership_forged = ProgressReportPartnershipForged::find(Helper::decrypt_id($id));
        return response()->json($partnership_forged, 200);
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
        $partnership_forged = ProgressReportPartnershipForged::find(Helper::decrypt_id($id));
        $partnership_forged->name = $request->input('name');
        $partnership_forged->type = $request->input('type');
        $partnership_forged->description = $request->input('description');
        $partnership_forged->update();
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
        $partnership_forged = ProgressReportPartnershipForged::find(Helper::decrypt_id($id));
        $partnership_forged->delete();
        return back();

    }
}
