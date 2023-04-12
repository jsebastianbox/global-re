<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reinsurers;
use Illuminate\Http\Request;

class AgenteRecords extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Reinsurers::where('reference', 'AG')->get()]);
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
        $ag = Reinsurers::create($request->all());
        $ag->reference = "AG";
        $ag->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reinsurers $id)
    {
        return response()->json(['data' => Reinsurers::where('reference', 'AG')->find($id)]);
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
        $ag = Reinsurers::find($id);
        $ag->update(array_merge([$request->all(), 'reference' => "AG"]));
        if ($request->has('contact_id')) {
            $ag->update($request->contact_id);
        }
        $ag->save();
        return redirect()->back()->with(['success', 'Agente actualizado correctamente.']);
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
        return redirect()->back()->with('success', 'Agente eliminado exitosamente.');
    }
}
