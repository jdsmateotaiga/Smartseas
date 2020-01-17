<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitMeasurement;
use Helper;
use Auth;
use Validator;

class UnitMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $unit_measurement = UnitMeasurement::where('active', 1)
                ->get();

        return view('dashboard.settings.unit_of_measurement.index')
                ->with('unit_measurement', $unit_measurement);

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
            'unit' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->messages(), 200);
        } else {
            $code = new UnitMeasurement;
            $code->user_id     = auth()->user()->id;
            $code->unit        = $request->input('unit');
            $code->description = $request->input('description');
            $code->save();
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
        $code_decrypt_id = Helper::decrypt_id($id);
        $code = UnitMeasurement::find($code_decrypt_id);
        return response()->json($code);
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
            'code' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return back();
        } else {
            $code_decrypt_id = Helper::decrypt_id($id);
            $code = UnitMeasurement::find($code_decrypt_id);
            if(auth()->user()->id == $code->user_id || auth()->user()->hasRole('admin')) {
                $code->code        = $request->input('code');
                $code->description = $request->input('description');
                $code->update();
                return back();
            }
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

    public function activate($id) {
        return Helper::activate(UnitMeasurement::class, $id);
    }

    public function deactivate($id) {
        return Helper::deactivate(UnitMeasurement::class, $id);
    }
}
