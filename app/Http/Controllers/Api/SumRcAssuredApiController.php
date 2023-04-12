<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SumRcAssured;
use Illuminate\Http\Request;

class SumRcAssuredApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $SumRcAssured = SumRcAssured::all();
            return response()->json($SumRcAssured);
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
            SumRcAssured::create($request->all());
            $SumRcAssured = SumRcAssured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $SumRcAssured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumRcAssured  $sumRcAssured
     * @return \Illuminate\Http\Response
     */
    public function show(SumRcAssured $sumRcAssured)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumRcAssured  $sumRcAssured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            SumRcAssured::find($id)->update($request->all());
            $SumRcAssured = SumRcAssured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $SumRcAssured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumRcAssured  $sumRcAssured
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SumRcAssured::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
