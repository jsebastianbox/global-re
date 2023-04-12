<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExclusionSlip;
use Illuminate\Http\Request;

class ExclusionSlipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ExclusionSlip = ExclusionSlip::all();
            return response()->json($ExclusionSlip);
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
            ExclusionSlip::create($request->all());
            $ExclusionSlip = ExclusionSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $ExclusionSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExclusionSlip  $exclusionSlip
     * @return \Illuminate\Http\Response
     */
    public function show(ExclusionSlip $exclusionSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExclusionSlip  $exclusionSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            ExclusionSlip::find($id)->update($request->all());
            $ExclusionSlip = ExclusionSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $ExclusionSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExclusionSlip  $exclusionSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ExclusionSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
