<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InformationReinsurance;
use App\Models\Slip;
use Illuminate\Http\Request;

class InformationReinsuranceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $object = InformationReinsurance::all();
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

            for ($i = 0; $i < count($request->name_insurer); $i++) {

                InformationReinsurance::create ([
                    'name_insurer' => $request->name_insurer[$i],
                    'sumaAsegurada' => $request->sumaAsegurada[$i],
                    'participacion' => $request->participacion[$i] ,
                    'tasaBruta' => $request->tasaBruta[$i] ,
                    'dstos' => $request->dstos[$i] ,
                    'tasaNeta' =>  $request->tasaNeta[$i] ,
                    'primaNeta' => $request->primaNeta[$i] ,
                    'primaPart' => $request->primaPart[$i] ,
                    'slip_id' => $request->slip_id
                ]);

                //$slip->information_reinsurance()->save($object);
            }

            $data = InformationReinsurance::where('slip_id', $request->slip_id)->get();
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
     * @param  \App\Models\InformationReinsurance  $informationReinsurance
     * @return \Illuminate\Http\Response
     */
    public function show(InformationReinsurance $informationReinsurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformationReinsurance  $informationReinsurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformationReinsurance  $informationReinsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            InformationReinsurance::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
