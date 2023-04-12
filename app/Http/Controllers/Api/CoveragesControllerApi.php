<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClausulasInventory;
use Illuminate\Http\Request;

class CoveragesControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $clausules = ClausulasInventory::all();
            return response()->json($clausules);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Error: ' . $th]);
        }
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
        try {
            ClausulasInventory::create($request->all());
            $clausule = ClausulasInventory::where('name', $request->name)->get();
            return response()->json(['msg'=>'Store successful', 'data'=>$clausule]);
        } catch (\Throwable $th) {
            return response()->json('Error: ' . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $clausule = ClausulasInventory::with('name')->find($id);
            return response()->json(['msg' => 'show', 'object' => $clausule]);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClausulasInventory  $clausule
     * @return \Illuminate\Http\Response
     */
    public function edit(ClausulasInventory $clausule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $clausule = ClausulasInventory::find($id);
            $clausule->update($request->all());

            return response()->json([
                'msg' => 'update',
                'object' => $clausule
            ], 200);
        } catch (\Exception $th) {
            return response()->json(['msg' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ClausulasInventory::findOrFail($id)->delete();
            return response()->json(['msg' => 'delete']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
