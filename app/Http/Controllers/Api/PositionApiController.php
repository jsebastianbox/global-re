<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Position::all();

        try {
            return response()->json($all);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Position::select('id', 'name')
                ->groupBy('name')
                ->get();
        } else {
            $employees = Position::select('id', 'name')
                ->where('name', 'like', '%' . $search . '%')
                ->groupBy('name')
                ->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                //"id" => $employee->id,
                "id" => $employee->name,
                "text" => $employee->name
            );
        }
        $response[] = array("id" => 'new_position', "text" => "Otro");

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Position::find($id);

        try {
            return response()->json($collection);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Position::find($id);

        $update->update($request->all());

        try {
            return response()->json($update);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Position::findOrFail($id)->delete();

        try {
            return response()->json(['msg' => 'destroy successfully']);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }
}
