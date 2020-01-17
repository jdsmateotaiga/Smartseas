<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use Validator;
use Helper;
use Auth;

class RemarkController extends Controller
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
        $rules = array(
            'body' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if( $validator->fails() ) {
            return response()->json($validator->messages(), 200);
        } else {
          $remark = new Remark;
          $remark->user_id      = auth()->user()->id;
          $remark->task_id      = Helper::decrypt_id($request->input('task_id'));
          $body                 = preg_replace("/\r\n|\r/", "<br />", $request->input('body'));
          $remark->body         = $body;
          $remark->save();
          return response()->json('success');
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
