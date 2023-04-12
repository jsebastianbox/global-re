<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reinsurers;
use Illuminate\Http\Request;

class LloydRecords extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lloyds = Reinsurers::where('reference', 'Lloyds')->get();
        return response()->json(['data'=>$lloyds]);
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
        $lloyds = Reinsurers::create($request->all());
        $lloyds->reference = 'Lloyds';
        $lloyds->save();

        return response()->json(['message'=>'Lloyd creado exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reinsurers $id)
    {
        return response()->json(Reinsurers::find($id));
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
        $lloyd = Reinsurers::find($id);
        $lloyd->reference = "Lloyds";
        $lloyd->update($request->all());

        return response()->json(['data'=>'Registro editado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reinsurers::find($id)->delete();
        return response()->json('Lloyd eliminado exitosamente');
    }
}
