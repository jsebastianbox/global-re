<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bussines;
use Illuminate\Http\Request;

class BussinesApiController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussines  $bussines
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        //$employees = Insurance::select('name','name')->distinct()->get();

        if ($search == '') {
            $employees = Bussines::select('name')->distinct()->get();
        } else {
            $employees = Bussines::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get();
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
     * @param  \App\Models\Bussines  $bussines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bussines $bussines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussines  $bussines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussines $bussines)
    {
        //
    }
}
