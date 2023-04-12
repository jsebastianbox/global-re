<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
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
        $id = Branch::create($request->all());

        return response()->json(["id" => $id->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Branch::orderby('id', 'desc')->select('id', 'name')->get();
        } else {
            $employees = Branch::orderby('id', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        //$response[] = array("id" => 'new', "text" => "Otro");

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
