<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use Illuminate\Http\Request;

class InvoicePaymentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $first_rows = json_decode($request->rows, true);
        $second_rows = json_decode($request->rows, true);

        foreach ($first_rows as $row) {
            // Update each row's data in the database
            $data = Borderoux::where('id', $id)->first();
            $data->reinsurance_broker = $row['reinsurance_broker'];
            $data->bank = $row['bank'];
            $data->received_value = $row['received_value'];
            $data->bank_deposit_date = $row['bank_deposit_date'];
            $data->save();
        }

        // foreach ($first_rows as $row) {
        //     // Update each row's data in the database
        //     $data = InvoicePayment::where('insured', $row['insured'])->first();
        //     $data->reinsurance_broker = $row['reinsurance_broker'];
        //     $data->bank = $row['bank'];
        //     $data->received_value = $row['received_value'];
        //     $data->bank_deposit_date = $row['bank_deposit_date'];
        //     $data->save();
        // }

        foreach ($second_rows as $row) {
            // Update each row's data in the database
            $data = BorderouxesInstallation::where('borderouxes_id', $id)->first();
            $data->status = $row['status'];
            $data->applied_value = $row['applied_value'];
            $data->save();
        }

        // foreach ($second_rows as $row) {
        //     // Update each row's data in the database
        //     $data = InvoicePayment::where('registry_number', $row['registry_number'])
        //         ->where('invoice_number', $row['invoice_number'])
        //         ->first();
        //     $data->status = $row['status'];
        //     $data->applied_value = $row['applied_value'];
        //     $data->save();
        // }

        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
