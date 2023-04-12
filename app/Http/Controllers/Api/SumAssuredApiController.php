<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SumAssured;
use Illuminate\Http\Request;

class SumAssuredApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $SumAssured = SumAssured::all();
            return response()->json($SumAssured);
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
            SumAssured::create($request->all());
            $SumAssured = SumAssured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $SumAssured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumAssured  $sumAssured
     * @return \Illuminate\Http\Response
     */
    public function show(SumAssured $sumAssured)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumAssured  $sumAssured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            SumAssured::find($id)->update($request->all());
            $SumAssured = SumAssured::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $SumAssured]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumAssured  $sumAssured
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SumAssured::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
