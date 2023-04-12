<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;

class VehicleDetailApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $VehicleDetail = VehicleDetail::all();
            return response()->json($VehicleDetail);
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
            VehicleDetail::create($request->all());
            $VehicleDetail = VehicleDetail::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $VehicleDetail]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleDetail  $vehicleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleDetail $vehicleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleDetail  $vehicleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            VehicleDetail::find($id)->update($request->all());
            $VehicleDetail = VehicleDetail::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $VehicleDetail]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleDetail  $vehicleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            VehicleDetail::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
