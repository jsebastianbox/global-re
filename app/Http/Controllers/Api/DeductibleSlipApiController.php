<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeductibleSlip;
use Illuminate\Http\Request;

class DeductibleSlipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $DeductibleSlip = DeductibleSlip::all();
            return response()->json($DeductibleSlip);
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
            DeductibleSlip::create($request->all());
            $DeductibleSlip = DeductibleSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $DeductibleSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeductibleSlip  $deductibleSlip
     * @return \Illuminate\Http\Response
     */
    public function show(DeductibleSlip $deductibleSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeductibleSlip  $deductibleSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DeductibleSlip::find($id)->update($request->all());
            $DeductibleSlip = DeductibleSlip::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $DeductibleSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeductibleSlip  $deductibleSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DeductibleSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
