<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reinsurers;
use App\Http\Requests\ReinsurerRequest;
use App\Models\ReinsurerRegion;
use App\Models\Insurance;

class ReinsurerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Reinsurers::with('type')
            ->with('business')
            ->with('position')
            ->with('region')
            ->with('excluye')->get();

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
        // foreach ($request['region'] as $key) {
        //     $fte = new ReinsurerRegion;
        //     $fte->reinsurer_id = 1;
        //     $fte->region_id= $key;
        //     $fte->save();
        // }

        // return 'xd';

        // foreach ($request['region'] as $key) {
        //     ReinsurerRegion::create($key);
        // }

        //ReinsurerRegion::create($request->all());
        Reinsurers::create($request->all());

        try {
            return response()->json(['msg' => 'store successfully']);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
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
            $reinsurers = Reinsurers::where('reference', $request->reference)->select('name', 'reference')->get();
        } else {
            $reinsurers = Reinsurers::where('reference', $request->reference)->select('name', 'reference')->where('name', 'like', '%' . $search . '%')->get();
        }

        //$response = array();
        foreach ($reinsurers as $item) {
            $response[] = array(
                "id" => $item->name,
                "text" => $item->name // . ' - ' . $item->reference
            );
        }

        $response[] = array("id" => 'new_reinsurer', "text" => "Otro");

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
        $collection = Reinsurers::where('id', $id)
            ->with('type')
            ->with('business')
            ->with('region')
            ->with('excluye')
            ->with('region')->first();

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
    public function update(ReinsurerRequest $request, $id)
    {
        $update = Reinsurers::find($id);

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
        Reinsurers::findOrFail($id)->delete();

        try {
            return response()->json(['msg' => 'destroy successfully']);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    public function getReinsurerBroker(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $reinsurer = Reinsurers::select('name')->distinct()->get()->toArray();
            $insurance = Insurance::select('name')->distinct()->get()->toArray();
            $employees = array_merge($reinsurer, $insurance);
        } else {
            $reinsurer = Reinsurers::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get()->toArray();
            $insurance = Insurance::select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get()->toArray();
            $employees = array_merge($reinsurer, $insurance);
        }
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee['name'],
                "text" => $employee['name']
            );
        }
        return response()->json($response);


        /* $reinsurer = Reinsurers::select('id','name')->get()->toArray();
        $insurance = Insurance::select('id','name')->get()->toArray();

        $all = array_merge($reinsurer, $insurance);

        try {
            return response()->json($all);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        } */
    }
}
