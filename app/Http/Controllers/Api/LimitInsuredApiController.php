<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LimitInsured;
use Illuminate\Http\Request;

class LimitInsuredApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $LimitInsured = LimitInsured::all();
            return response()->json($LimitInsured);
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
            LimitInsured::create($request->all());
            $LimitInsured = LimitInsured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $LimitInsured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LimitInsured  $limitInsured
     * @return \Illuminate\Http\Response
     */
    public function show(LimitInsured $limitInsured)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LimitInsured  $limitInsured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            LimitInsured::find($id)->update($request->all());
            $LimitInsured = LimitInsured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $LimitInsured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LimitInsured  $limitInsured
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            LimitInsured::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
