<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bussines;
use App\Models\ReinsurerExcluye;
use App\Models\Reinsurers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReinsurerExcluyeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $excluye = ReinsurerExcluye::select('id', 'name')->groupBy('name')->orderBy('id', 'desc')->get();

        return $excluye;

        /* $all = ReinsurerExcluye::all();

        try {
            return response()->json($all);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        } */
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
     * @param  \App\Models\ReinsurerExcluye  $reinsurerExcluye
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $search = $request->search;

        //$employees = Insurance::select('name','name')->distinct()->get();

        if ($search == '') {
            $employees = ReinsurerExcluye::select('name')->distinct()->get();
        } else {
            $employees = ReinsurerExcluye::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->name,
                "text" => $employee->name
            );
        }
        
        $response[] = array("id" => '', "text" => '');

        return response()->json($response);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReinsurerExcluye  $reinsurerExcluye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReinsurerExcluye $reinsurerExcluye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReinsurerExcluye  $reinsurerExcluye
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReinsurerExcluye $reinsurerExcluye)
    {
        //
    }
}
