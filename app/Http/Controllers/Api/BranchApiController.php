<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->input('type_coverage');
        session()->put('type_coverage', $data);

        // Debug output to check the value being set in the session
        dd(session('type_coverage'));

        return response($request);
    }


    public function saveTypeCoverage(Request $request)
    {
        $data = $request->input('branch');
        session(['type_coverage' => $data]);
    }

    public function showtTypeCoverage()
    {
        $data = session('type_coverage');
        return $data;
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
    // public function show(Request $request)
    // {
    //     $search = $request->search;

    //     if ($search == '') {
    //         $employees = Branch::orderby('id', 'desc')->select('id', 'name')->get();
    //     } else {
    //         $employees = Branch::orderby('id', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
    //     }

    //     //$response = array();
    //     foreach ($employees as $employee) {
    //         $response[] = array(
    //             "id" => $employee->id,
    //             "text" => $employee->name
    //         );
    //     }
    //     $response[] = array("id" => '', "text" => '');

    //     return response()->json($response);
    // }
    public function show(Request $request, $id = null)
    {
        if ($id) {
            $branch = Branch::find($id);
            if ($branch) {
                $response[] = array(
                    "id" => $branch->id,
                    "text" => $branch->name
                );
            } else {
                $response[] = array("id" => '', "text" => '');
            }
        } else {
            $search = $request->search;

            if ($search == '') {
                $branches = Branch::orderby('id', 'desc')->select('id', 'name')->get();
            } else {
                $branches = Branch::orderby('id', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
            }

            $response = array();
            foreach ($branches as $branch) {
                $response[] = array(
                    "id" => $branch->id,
                    "text" => $branch->name
                );
            }
            $response[] = array("id" => '', "text" => '');
        }

        return response()->json($response);
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
