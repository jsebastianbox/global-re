<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::limit(10)->get();

        return response()->json($country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Country::created([
            'name' => $request->name,
            'code' => $request->code
        ]); */

        return response()->json('create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Country::orderby('id', 'asc')->select('id', 'name')->get();
        } else {
            $employees = Country::orderby('id', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                //"id" => $employee->name,
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
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Country::find($id)->update($request->all());

        return response()->json('update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Country::find($id)->delete();

        return response()->json('delate success');
    }
}
