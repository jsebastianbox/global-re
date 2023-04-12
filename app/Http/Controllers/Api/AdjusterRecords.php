<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdjusterSinister;
use App\Models\Country;
use App\Models\Position;
use App\Models\Region;
use App\Models\Reinsurers;
use Illuminate\Http\Request;

class AdjusterRecords extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjusters = AdjusterSinister::all();
        return response()->json(['data'=>$adjusters]);
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
        $reinsurer = Reinsurers::create($request->all());
        $country_name = Country::find($request->input('country_id'))->first()->name;
        $position_name = Position::find($request->input('position_id')->first()->name);
        $region_name = Region::find($request->input('region_id')->first()->name);
        $reinsurer->country_id = $country_name;
        $reinsurer->position_id = $position_name;
        $reinsurer->region_id = $region_name;
        $reinsurer->save();

        return response()->json(['message'=>'creacion exitosa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdjusterSinister $adjuster)
    {
        return response()->json($adjuster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        dd('asdasdasdasd');
        $adjuster = AdjusterSinister::find($id);

        $adjuster->update([$request->all(),
        $adjuster->reference => "Ajustador",]);

        return redirect()->back()->with(['msj'=>'datos actualizados']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
