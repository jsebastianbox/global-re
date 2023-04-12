<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReinsuranceManagement;
use Illuminate\Http\Request;

class ReinsuranceManagementApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ReinsuranceManagement::all();

        try {
            return response()->json($all);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
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
            $rm = ReinsuranceManagement::create($request->all());

            return response()->json(['msg' => 'store successfully', 'object'=>$rm]);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReinsuranceManagement  $reinsuranceManagement
     * @return \Illuminate\Http\Response
     */
    public function show(ReinsuranceManagement $reinsuranceManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReinsuranceManagement  $reinsuranceManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = ReinsuranceManagement::find($id)->update($request->all());

            $object = ReinsuranceManagement::find($id);
            return response()->json(['msg'=>'update successfully', 'object'=>$object]);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReinsuranceManagement  $reinsuranceManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ReinsuranceManagement::findOrFail($id)->delete();
            return response()->json(['msg' => 'destroy successfully']);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }
}
