<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use Illuminate\Http\Request;

class BorderouxesControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bx = Borderoux::with('borderouxInstallation')->get();
            return response()->json($bx);
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
            $bx = Borderoux::create($request->all());
            return response()->json(['msg' => 'store', 'object' => $bx]);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'no sea pendejo y mande bien los parametros :v']);
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
        try {
            $bx = Borderoux::with('borderouxInstallation')->find($id);
            return response()->json(['msg' => 'show', 'object' => $bx]);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Despidan al del back x1000 xd */
    // public function update(Request $request, $id)
    // {
    //     try {

    //         $borderoux = Borderoux::find($id);
    //         $borderoux->update($request->all());

    //         return response()->json([
    //             'msg' => 'update',
    //             'object' => $borderoux
    //         ], 200);
    //     } catch (\Exception $th) {
    //         return response()->json(['msg' => 'Error: ' . $th]);
    //     }
    // }
    public function update(Request $request, $id)
    {
        try {

            $borderoux = Borderoux::find($id);
            $borderoux->update($request->all());

            return response()->json([
                'msg' => 'update',
                'object' => $borderoux
            ], 200);
        } catch (\Exception $th) {
            return response()->json([
                'msg' => 'Error: ' . $th->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Borderoux::findOrFail($id)->delete();
            return response()->json(['msg' => 'delete']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function borderouxFilterInstall(Request $request)
    {
        try {
            $borderoux = Borderoux::find($request->borderouxesId);
            $filter = array();
            foreach ($request->idInstall as $install) {
                $search = BorderouxesInstallation::find($install);
                if ($search != null) {
                    array_push($filter, $search);
                }
            }
            return response()->json([
                'borderouxes' => $borderoux, 'install' => $filter
            ], 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }
}
