<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sprint;
use Auth;
use Validator;
use Helper;
use Session;

class SprintController extends Controller
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
            'sprint_title'    =>  'required',
            'start_date'      =>  'required',
            'end_date'        =>  'required'
        );

        $messages = [
            'sprint_title.required'     => 'The Sprint Title field is required.',
            'start_date.required'       => 'The start date field is required.',
            'end_date.required'         => 'The completion date is is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back();
        } else {
            $sprint = new Sprint;
            $sprint->user_id              = Auth::user()->id;
            $sprint->project_id           = Helper::decrypt_id($request->input('project_id'));
            $sprint->sprint_title         = $request->input('sprint_title');
            $sprint->sprint_description   = $request->input('sprint_description');
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
        $sprint_decrypt_id = Helper::decrypt_id($id);
        $sprint = Sprint::find($sprint_decrypt_id);
        return response()->json($sprint);
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
            'sprint_title'    =>  'required',
            'start_date'      =>  'required',
            'end_date'        =>  'required'
        );

        $messages = [
            'sprint_title.required'     => 'The Sprint Title field is required.',
            'start_date.required'       => 'The start date field is required.',
            'end_date.required'         => 'The completion date is is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back();
        } else {
            $sprint_decrypt_id = Helper::decrypt_id($id);
            $sprint            = Sprint::find($sprint_decrypt_id);
            $sprint->sprint_title         = $request->input('sprint_title');
            $sprint->sprint_description   = $request->input('sprint_description');
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
}
