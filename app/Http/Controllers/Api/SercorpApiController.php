<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\Sercorp;
use Illuminate\Http\Request;

class SercorpApiController extends Controller
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
        $response = Sercorp::create($request->all());

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        //$employees = Insurance::select('name','name')->distinct()->get();

        if ($search == '') {
            $employees = Entity::select('name')->distinct()->get();
        } else {
            $employees = Entity::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->name,
                "text" => $employee->name
            );
        }

        $response[] = array("id" => 'new_sercorp', "text" => "Otro");
        
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sercorp $sercorp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sercorp $sercorp)
    {
        //
    }
}
