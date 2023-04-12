<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GuaranteePayment;
use Illuminate\Http\Request;

class GuaranteePaymentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $GuaranteePayment = GuaranteePayment::all();
            return response()->json($GuaranteePayment);
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
            GuaranteePayment::create($request->all());
            $GuaranteePayment = GuaranteePayment::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $GuaranteePayment]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuaranteePayment  $guaranteePayment
     * @return \Illuminate\Http\Response
     */
    public function show(GuaranteePayment $guaranteePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuaranteePayment  $guaranteePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            GuaranteePayment::find($id)->update($request->all());
            $GuaranteePayment = GuaranteePayment::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $GuaranteePayment]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuaranteePayment  $guaranteePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            GuaranteePayment::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
