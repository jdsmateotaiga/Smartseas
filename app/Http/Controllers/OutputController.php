<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use App\User;
use App\BudgetCode;
use App\Output;
use Validator;
use Auth;


class OutputController extends Controller
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
        if( $validator->fails() ) {
            return response()->json($validator->messages(), 200);
        } else {
          $outcome = new Output;
          $outcome->user_id = auth()->user()->id;
          $outcome->project_id = Helper::decrypt_id($request->input('project_id'));
          $outcome->outcome_id = Helper::decrypt_id($request->input('outcome_id'));
          $outcome->title = $request->input('title');
          $outcome->description = $request->input('description');
          $outcome->save();
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
        $view = 'dashboard.project.output.show';
        return $this->showOutput($id, $view);
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
        $outcome_decrypt_id = Helper::decrypt_id($id);
        $outcome = Output::find($outcome_decrypt_id);
        return response()->json($outcome);
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
        if( $validator->fails() ) {
            return back();
        } else {
          $outcome_decrypt_id = Helper::decrypt_id($id);
          $outcome =  Output::find($outcome_decrypt_id);
          $outcome->title = $request->input('title');
          $outcome->description = $request->input('description');
          $outcome->update();
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
      return Helper::deactivate(Output::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(Output::class, $id);
    }

    public function showOutput($id, $view) {
      $output_decrypt_id = Helper::decrypt_id($id);
      if(auth()->user()->hasRole('admin')) {
          $output = Output::find($output_decrypt_id);
          return view($view)
          ->with('output', $output);
      } else {
          $output = Output::where('id', $output_decrypt_id)->where('active', 1)->first();
          if($output) {
            return view($view)
            ->with('output', $output);
          } else {
            return response()->view('errors.404', [], 404);
          }
      }
    }

    public function partnerShowOutput($id) {
        $view = 'dashboard.project.output.show';
        return $this->showOutput($id, $view);
    }

}
