<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GuaranteePaymentClient;
use Illuminate\Http\Request;

class GuarantePaymentClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $guaranteePayment = GuaranteePaymentClient::all();
            return response()->json($guaranteePayment);
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
            GuaranteePaymentClient::create($request->all());
            $guaranteePayment = GuaranteePaymentClient::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $guaranteePayment]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuaranteePaymentClient  $guaranteePaymentClient
     * @return \Illuminate\Http\Response
     */
    public function show(GuaranteePaymentClient $guaranteePaymentClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuaranteePaymentClient  $guaranteePaymentClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            GuaranteePaymentClient::find($id)->update($request->all());
            $GuaranteePayment = GuaranteePaymentClient::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $GuaranteePayment]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuaranteePaymentClient  $guaranteePaymentClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            GuaranteePaymentClient::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
