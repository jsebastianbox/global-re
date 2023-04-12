<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClauseSlip;
use Illuminate\Http\Request;

class ClauseSlipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ClauseSlip = ClauseSlip::all();
            return response()->json($ClauseSlip);
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
            ClauseSlip::create($request->all());
            $ClauseSlip = ClauseSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $ClauseSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClauseSlip  $clauseSlip
     * @return \Illuminate\Http\Response
     */
    public function show(ClauseSlip $clauseSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClauseSlip  $clauseSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            ClauseSlip::find($id)->update($request->all());
            $ClauseSlip = ClauseSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $ClauseSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClauseSlip  $clauseSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ClauseSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
