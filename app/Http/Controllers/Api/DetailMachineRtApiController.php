<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailMachineRt;
use Illuminate\Http\Request;

class DetailMachineRtApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $DetailMachineRt = DetailMachineRt::all();
            return response()->json($DetailMachineRt);
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
            DetailMachineRt::create($request->all());
            $DetailMachineRt = DetailMachineRt::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $DetailMachineRt]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailMachineRt  $detailMachineRt
     * @return \Illuminate\Http\Response
     */
    public function show(DetailMachineRt $detailMachineRt)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailMachineRt  $detailMachineRt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DetailMachineRt::find($id)->update($request->all());
            $DetailMachineRt = DetailMachineRt::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $DetailMachineRt]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailMachineRt  $detailMachineRt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DetailMachineRt::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
