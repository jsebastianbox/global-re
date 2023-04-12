<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoatDetailSlip;
use Illuminate\Http\Request;

class BoatDetailSlipApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $BoatDetailSlip = BoatDetailSlip::all();
            return response()->json($BoatDetailSlip);
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
            BoatDetailSlip::create($request->all());
            $BoatDetailSlip = BoatDetailSlip::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $BoatDetailSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoatDetailSlip  $boatDetailSlip
     * @return \Illuminate\Http\Response
     */
    public function show(BoatDetailSlip $boatDetailSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoatDetailSlip  $boatDetailSlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            BoatDetailSlip::find($id)->update($request->all());
            $BoatDetailSlip = BoatDetailSlip::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $BoatDetailSlip]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoatDetailSlip  $boatDetailSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BoatDetailSlip::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
