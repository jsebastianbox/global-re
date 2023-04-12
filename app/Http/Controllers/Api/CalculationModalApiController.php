<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CalculationModal;
use Illuminate\Http\Request;

class CalculationModalApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $object = CalculationModal::all();
            return response()->json($object);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'error']);
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

            CalculationModal::create($request->all());

            $data = CalculationModal::where('slip_id', $request->slip_id)->get();
            return response()->json([
                'msg' => 'store successful',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalculationModal  $calculationModal
     * @return \Illuminate\Http\Response
     */
    public function show(CalculationModal $calculationModal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalculationModal  $calculationModal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            CalculationModal::find($id)->update($request->all());
            $all = CalculationModal::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $all]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalculationModal  $calculationModal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CalculationModal::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
