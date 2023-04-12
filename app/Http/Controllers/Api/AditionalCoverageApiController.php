<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdditionalCoverage;
use Illuminate\Http\Request;

class AditionalCoverageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $additionalCoverage = AdditionalCoverage::all();
            return response()->json($additionalCoverage);
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
            AdditionalCoverage::create($request->all());
            $additionalCoverage = AdditionalCoverage::where('slip_id',$request->slip_id)->get();
            return response()->json(['msg'=>'store successful', 'data'=>$additionalCoverage]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionalCoverage  $additionalCoverage
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalCoverage $additionalCoverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionalCoverage  $additionalCoverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            AdditionalCoverage::find($id)->update($request->all());
            $additionalCoverage = AdditionalCoverage::where('slip_id',$request->slip_id)->get();
            return response()->json(['msg'=>'edit successful', 'data'=>$additionalCoverage]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalCoverage  $additionalCoverage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            AdditionalCoverage::find($id)->delete();
            return response()->json(['msg'=>'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
