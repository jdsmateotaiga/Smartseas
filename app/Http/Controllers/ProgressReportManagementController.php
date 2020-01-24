<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressReportManagement;
use Helper;

class ProgressReportManagementController extends Controller
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
        $management = new ProgressReportManagement;
        $management->user_id     = auth()->user()->id;
        $management->project_id  = Helper::decrypt_id($request->input('project_id'));
        $management->progress_report_id  = Helper::decrypt_id($request->input('progress_report_id'));
        $management->product = $request->input('product');
        $management->type = $request->input('type');
        $management->published = $request->input('published');
        $management->audience = $request->input('audience');
        $management->link = $request->input('link');
        $management->save();
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
        $management = ProgressReportManagement::find(Helper::decrypt_id($id));
        return response()->json($management, 200);
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
        $management = ProgressReportManagement::find(Helper::decrypt_id($id));
        $management->product = $request->input('product');
        $management->type = $request->input('type');
        $management->published = $request->input('published');
        $management->audience = $request->input('audience');
        $management->link = $request->input('link');
        $management->update();
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
        $management = ProgressReportManagement::find(Helper::decrypt_id($id));
        $management->delete();
        return back();
    }
}
