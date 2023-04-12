<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Security;
use Illuminate\Http\Request;

class SecurityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Security = Security::all();
            return response()->json($Security);
        } catch (\Throwable $th) {
            return response()->json('error');
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
            Security::create($request->all());
            $Security = Security::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'store successful', 'data' => $Security]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Security $security)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Security::find($id)->update($request->all());
            $Security = Security::where('slip_id', $request->slip_id)->get();
            return response()->json(['msg' => 'edit successful', 'data' => $Security]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Security::find($id)->delete();
            return response()->json(['msg' => 'delete successful']);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
