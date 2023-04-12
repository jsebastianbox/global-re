<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BorderouxInstallationController;
use App\Http\Controllers\Controller;
use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use App\Models\Cobrekerajes;
use App\Models\ConfigGlobal;
use Exception;
use Illuminate\Http\Request;

class BorderouxesInstallationApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** Putos todos, arreglé el código para que sirva con un query en la url, ahora se puede usar bien .l.
         * Si quieren pueden borrar este comentario y el código comentado, los tqm :3
         */
        // try {
        //     /*  $config = ConfigGlobal::where('key', 'invoice_serie')->first();

        //     for ($i = 0; $i < 5; $i++) {
        //         $test = intval($config->value);

        //         $comprobante = str_pad($test + $i, 9, "0", STR_PAD_LEFT);
        //     }
        //     return response()->json($comprobante); */

        //     $borderoux = BorderouxesInstallation::with('borderoxes')->get();
        //     return response()->json($borderoux);
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        try {
            $borderoux = BorderouxesInstallation::with('borderoxes');

            if ($request->has('borderouxes_id')) {
                $borderoux->where('borderouxes_id', $request->get('borderouxes_id'));
            }

            $borderoux = $borderoux->get();

            return response()->json($borderoux);
        } catch (\Throwable $th) {
            throw $th;
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
            $borderoux = BorderouxesInstallation::create($request->all());
            return response()->json(['msg' => 'store', 'object' => $borderoux]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rm = BorderouxesInstallation::with('borderoxes')->find($id);
            return response()->json(['msg' => 'show', 'object' => $rm]);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    /**Pinche codigo kk, despidan al del backend >:( */
    //
    // public function update(Request $request, $id)
    // {
    //     try {

    //         $borderoux = BorderouxesInstallation::find($id);
    //         $borderoux->update($request->all());

    //         $rm = Borderoux::with('borderouxInstallation')->where('id', $request->borderouxes_id)->first();
    //         return response()->json([
    //             'msg' => 'update',
    //             'object' => $borderoux,
    //         ], 200);
    //     } catch (Exception $th) {
    //         return $th;
    //     }
    // }
    public function update(Request $request, $id)
    {
        // dd($request);
        try {

            $borderoux = BorderouxesInstallation::find($id);

            $borderoux->update($request->all());

            // if ($borderoux->gross_premium != $request->gross_premium
            // || $borderoux->taxes != $request->taxes
            // || $borderoux->net_premium != $request->net_premium
            // || $borderoux->num_installation != $request->num_installation
            // || $borderoux->num_days != $request->num_days
            // || $borderoux->date_installation != $request->date_installation
            // || $borderoux->commission != $request->commission
            // || $borderoux->commission_total != $request->commission_total
            // || $borderoux->invoice_balance != $request->invoice_balance
            // || $borderoux->applied_value != $request->applied_value
            // || $borderoux->invoice_value != $request->invoice_value
            // || $borderoux->invoice_serie != $request->invoice_serie
            // || $borderoux->invoice_number != $request->invoice_number
            // || $borderoux->is_generate_invoice != $request->is_generate_invoice) {
            //     $borderoux->update($request->all());
            // }

            $rm = Borderoux::with('borderouxInstallation')->where('id', $request->borderouxes_id)->first();
            return response()->json([
                'msg' => 'update',
                'object' => $borderoux,
            ], 200);
        } catch (Exception $th) {
            return $th;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BorderouxesInstallation::findOrFail($id)->delete();
            return response()->json(['msg' => 'delete']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showInstallationBorderoux($borderouxid)
    {
        try {
            $rm = Borderoux::with('borderouxInstallation')->where('id', $borderouxid)->first();
            return response()->json([
                'msg' => 'showInstallationBorderoux',
                'borderoux' => $rm,
                /* 'commission_percentag'=>$rm->commission_percentage,
                'commission_total' => $rm->commission_total,
                'installation' => $rm->installation,
                'from' => $rm->from,
                'gross_premium' => $rm->gross_premium,
                'commission_percentage' => $rm->commission_percentage,
                'object' => $rm->borderouxInstallation*/
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    //TODO
    //Pendite la busqueda de la factura por el numero de serie
    public function showInstallationSerie($invoiceserie)
    {

        try {
            $rm = BorderouxesInstallation::with('borderoxes')->where('invoice_serie', $invoiceserie)->first();

            return response()->json([]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
