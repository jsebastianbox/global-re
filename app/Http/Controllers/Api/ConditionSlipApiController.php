<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConditionSlip;
use Illuminate\Http\Request;

class ConditionSlipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ConditionSlip = ConditionSlip::all();
            return response()->json($ConditionSlip);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ConditionSlip::create($request->all());
            $ConditionSlip = ConditionSlip::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $ConditionSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConditionSlip  $conditionSlip
     * @return \Illuminate\Http\Response
     */
    public function show(ConditionSlip $conditionSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConditionSlip  $conditionSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            ConditionSlip::find($id)->update($request->all());
            $ConditionSlip = ConditionSlip::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $ConditionSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConditionSlip  $conditionSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ConditionSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
