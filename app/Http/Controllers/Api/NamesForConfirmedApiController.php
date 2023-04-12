<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NamesForConfirmed;
use Illuminate\Http\Request;

class NamesForConfirmedApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $object = NamesForConfirmed::all();
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

            for ($i = 0; $i < count($request->cobertura); $i++) {

                NamesForConfirmed::create([
                    'cobertura' => $request->cobertura[$i],
                    'limiteAsegurado' => $request->limiteAsegurado[$i],
                    'tasaAjuste' => $request->tasaAjuste[$i],
                    'primaBrutaUno' => $request->primaBrutaUno[$i],
                    'primaPartUno' => $request->primaPartUno[$i],
                    'dstos' => $request->dstos[$i],
                    'prima' => $request->prima[$i],
                    'tasa' => $request->tasa[$i],
                    'primaBrutaDos' => $request->primaBrutaDos[$i],
                    'primaPartDos' => $request->primaPartDos[$i],
                    'comision' => $request->comision[$i],
                    'comisionBq' => $request->comisionBq[$i],
                    'impRenta' => $request->impRenta[$i],
                    'subTotal' => $request->subTotal[$i],
                    'isd' => $request->isd[$i],
                    'primaNeta' => $request->primaNeta[$i],
                    'feePartener' => $request->feePartener[$i],
                    'feeGlobal' => $request->feeGlobal[$i],
                    'slip_id' => $request->slip_id
                ]);

                //$slip->information_reinsurance()->save($object);
            }

            $data = NamesForConfirmed::where('slip_id', $request->slip_id)->get();
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
     * @param  \App\Models\NamesForConfirmed  $namesForConfirmed
     * @return \Illuminate\Http\Response
     */
    public function show(NamesForConfirmed $namesForConfirmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NamesForConfirmed  $namesForConfirmed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NamesForConfirmed $namesForConfirmed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NamesForConfirmed  $namesForConfirmed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            NamesForConfirmed::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
