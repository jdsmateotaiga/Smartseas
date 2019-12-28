<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Outcome;
use App\BudgetCode;
use Helper;
use Validator;
use Auth;



class OutcomeController extends Controller
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
            return back();
        } else {
          $outcome = new Outcome;
          $outcome->user_id = auth()->user()->id;
          $outcome->project_id = Helper::decrypt_id($request->input('project_id'));
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
        $view = 'dashboard.project.outcome.show';
        return $this->showOutcome($id, $view);
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
        $outcome = Outcome::find($outcome_decrypt_id);
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
          $outcome =  Outcome::find($outcome_decrypt_id);
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
      return Helper::deactivate(Outcome::class, $id);
    }

    public function activate($id)
    {
      return Helper::activate(Outcome::class, $id);
    }

    public function showOutcome($id, $view) {
      $outcome_decrypt_id = Helper::decrypt_id($id);
      $code = BudgetCode::all();
      if(auth()->user()->hasRole('admin')) {
          $outcome = Outcome::find($outcome_decrypt_id);
          return view('dashboard.project.outcome.show')
                ->with('outcome', $outcome);
      } else {
          $outcome = Outcome::where('id', $outcome_decrypt_id)->where('active', 1)->first();
          if($outcome) {
            return view('dashboard.project.outcome.show')
                  ->with('outcome', $outcome);
          } else {
            return response()->view('errors.404', [], 404);
          }
      }
    }

    public function partnerShowOutcome($id) {
      $view = 'dashboard.project.outcome.show';
      return $this->showOutcome($id, $view);
    }
}
