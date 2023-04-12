<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdjusterSinister;
use Illuminate\Http\Request;

class AdjusterSinisterApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = AdjusterSinister::select('name')->distinct()->get();

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdjusterSinister  $adjusterSinister
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $search = $request->search;

        //$employees = Insurance::select('name','name')->distinct()->get();

        if ($search == '') {
            $employees = AdjusterSinister::select('name')->distinct()->get();
        } else {
            $employees = AdjusterSinister::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->name,
                "text" => $employee->name
            );
        }
        $response[] = array("id" => 'new_adjuster', "text" => "Otro");

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdjusterSinister  $adjusterSinister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdjusterSinister $adjusterSinister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdjusterSinister  $adjusterSinister
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdjusterSinister $adjusterSinister)
    {
        //
    }
}
