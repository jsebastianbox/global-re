<?php

namespace App\Http\Controllers;

use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $user = Auth::user();
        return view('admin.databases.ajustadores')
            ->with('user', $user); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $borderouxesInstallation = BorderouxesInstallation::find($request->id);

        $invoicePayment = InvoicePayment::create($request->all());
        $updateInvoice = $invoicePayment->find($invoicePayment->id);

        $updateInvoice->update([
            'commission_total' => $borderouxesInstallation->commission_total, //comision total
            'invoice_value' => $borderouxesInstallation->invoice_value, //valor factura
            'invoice_balance' => $borderouxesInstallation->invoice_value - $request->received_value // saldo factura
        ]);

        $borderouxesInstallation->update([
            'applied_value' => $borderouxesInstallation->applied_value + $invoicePayment->applied_value, //valor aplicado
            'invoice_balance' => $borderouxesInstallation->invoice_balance - $request->received_value, //saldo factura
            //'invoice_balance' => $borderouxesInstallation->invoice_value - $request->received_value // saldo factura
        ]);

        $borderouxesInstallation->invoicePayment()->save($invoicePayment);

        return redirect()->back();

        /* $user = Auth::user();
        return view('admin.cartera.borderaux.manejo')
            ->with('user', $user); */
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
