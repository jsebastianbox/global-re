<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ObjectInsurance;
use Illuminate\Http\Request;

class ObjectInsuranceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ObjectInsurance = ObjectInsurance::all();
            return response()->json($ObjectInsurance);
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
            ObjectInsurance::create($request->all());
            $ObjectInsurance = ObjectInsurance::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $ObjectInsurance]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObjectInsurance  $objectInsurance
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectInsurance $objectInsurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObjectInsurance  $objectInsurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            ObjectInsurance::find($id)->update($request->all());
            $ObjectInsurance = ObjectInsurance::where('model_id', $request->model_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $ObjectInsurance]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObjectInsurance  $objectInsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ObjectInsurance::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
