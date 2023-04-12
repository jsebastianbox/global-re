<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoverageSlip;
use Illuminate\Http\Request;

class CoverageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $coverageSlip = CoverageSlip::all();
            return response()->json($coverageSlip);
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
            CoverageSlip::create($request->all());
            $coverageSlip = CoverageSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $coverageSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoverageSlip  $coverageSlip
     * @return \Illuminate\Http\Response
     */
    public function show(CoverageSlip $coverageSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoverageSlip  $coverageSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            CoverageSlip::find($id)->update($request->all());
            $coverageSlip = CoverageSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $coverageSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoverageSlip  $coverageSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CoverageSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
