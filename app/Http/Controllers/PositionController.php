<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $search = $request->search;

        if ($search == '') {
            $employees = Position::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $employees = Position::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        return response()->json($response); */
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
        $id = Position::create($request->all());

        return response()->json(["id" => $id->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Position::orderby('name', 'desc')->select('id', 'name')->get();
        } else {
            $employees = Position::orderby('name', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        $response[] = array("id" => 'new_position', "text" => "Otro");

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
