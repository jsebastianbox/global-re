<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculoModalController extends Controller
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

        //return $request;
        $tasaneta = array();
        $primaneta = array();
        $primapart = array();

        $sumpartipacion = 0;
        $sumprimaneta = 0;
        $sumprimapart = 0;

        try {
            for ($i = 0; $i < count($request->sumasegurada); $i++) {
                $calculo_tasaneta = $request->tasabruta[$i] - ($request->tasabruta[$i] * ($request->dstos[$i] / 100));
                $calculo_primaneta = ($request->sumasegurada[$i] * $calculo_tasaneta) / 100;
                $calculo_primapart = ($calculo_primaneta * $request->participacion[$i]) / 100;

                array_push($tasaneta, number_format($calculo_tasaneta, 4));
                array_push($primaneta, number_format($calculo_primaneta, 2));
                array_push($primapart, number_format($calculo_primapart, 2));

                $sumpartipacion += $request->participacion[$i];
                $sumprimaneta += $calculo_primaneta;
                $sumprimapart += $calculo_primapart;
            }

            return response()->json([
                'tasa_neta' => $tasaneta,
                'prima_neta' => $primaneta,
                'prima_part' => $primapart,
                'suma_participacion' => number_format($sumpartipacion, 2),
                'suma_prima_neta' => number_format($sumprimaneta, 2),
                'suma_prima_part' => number_format($sumprimapart, 2),
            ]);
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'turismo no me trataria asi :c'
            ]);
        }
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
        //
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
