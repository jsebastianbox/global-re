<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InformationAerialHelmets;
use Illuminate\Http\Request;

class InformationAerialHelmetsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $InformationAerialHelmets = InformationAerialHelmets::all();
            return response()->json($InformationAerialHelmets);
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
            InformationAerialHelmets::create($request->all());
            $InformationAerialHelmets = InformationAerialHelmets::where('slip_aerial_helmet_id', $request->slip_aerial_helmet_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $InformationAerialHelmets]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformationAerialHelmets  $informationAerialHelmets
     * @return \Illuminate\Http\Response
     */
    public function show(InformationAerialHelmets $informationAerialHelmets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformationAerialHelmets  $informationAerialHelmets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            InformationAerialHelmets::find($id)->update($request->all());
            $InformationAerialHelmets = InformationAerialHelmets::where('slip_aerial_helmet_id', $request->slip_aerial_helmet_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $InformationAerialHelmets]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformationAerialHelmets  $informationAerialHelmets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            InformationAerialHelmets::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
