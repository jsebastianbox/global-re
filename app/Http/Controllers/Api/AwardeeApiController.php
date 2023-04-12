<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Awardee;
use Illuminate\Http\Request;

class AwardeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $id = Awardee::create($request->all());

        return response()->json(["id" => $id->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Awardee  $awardee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Awardee::orderby('id', 'desc')->select('id', 'name')->get();
        } else {
            $employees = Awardee::orderby('id', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        $response[] = array("id" => 'new_awardee', "text" => 'Otro');

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Awardee  $awardee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Awardee $awardee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Awardee  $awardee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Awardee $awardee)
    {
        //
    }
}
