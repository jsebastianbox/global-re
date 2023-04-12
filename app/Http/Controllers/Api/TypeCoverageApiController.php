<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeCoverage;
use Illuminate\Http\Request;

class TypeCoverageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = TypeCoverage::all();
        return response()->json(['data'=>$type]);
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
     * @param  \App\Models\TypeCoverage  $typeCoverage
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = TypeCoverage::orderby('id', 'asc')->select('id', 'name')->get();
        } else {
            $employees = TypeCoverage::orderby('id', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        //$response[] = array("id" => 'new_branch', "text" => "Otro");

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeCoverage  $typeCoverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeCoverage $typeCoverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeCoverage  $typeCoverage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeCoverage $typeCoverage)
    {
        //
    }
}
