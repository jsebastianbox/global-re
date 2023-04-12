<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PonderacionCost;
use Illuminate\Http\Request;

class PonderacionCostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $object = PonderacionCost::all();
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

            for ($i = 0; $i < count($request->partPonderada); $i++) {

                PonderacionCost::create([
                    'partPonderada'=> $request->partPonderada[$i],
                    'ponderad'=> $request->ponderad[$i],
                    'tasaNetaReaseg'=> $request->tasaNetaReaseg[$i],
                    'tasaBrutaReaseg'=> $request->tasaBrutaReaseg[$i],
                    'comision'=> $request->comision[$i],
                    'slip_id' => $request->slip_id
                ]);
            }

            $data = PonderacionCost::where('slip_id', $request->slip_id)->get();
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
     * @param  \App\Models\PonderacionCost  $ponderacionCost
     * @return \Illuminate\Http\Response
     */
    public function show(PonderacionCost $ponderacionCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PonderacionCost  $ponderacionCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PonderacionCost $ponderacionCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PonderacionCost  $ponderacionCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            PonderacionCost::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
