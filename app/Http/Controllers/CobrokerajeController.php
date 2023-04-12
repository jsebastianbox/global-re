<?php

namespace App\Http\Controllers;

use App\Models\Cobrekerajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobrokerajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('admin.tecnico.slip.type_slip.slipCobrokerajes')
            ->with('user', $user);
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
        try {
            $user = Auth::user();

            Cobrekerajes::create($request->all());

            return view('admin.tecnico.slip.type_slip.slipCobrokerajes')
                ->with('user', $user);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cobrekerajes  $cobrekerajes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = Auth::user();
            $cobrekerajes = Cobrekerajes::find($id);

            return view('admin.tecnico.slip.type_slip.slipCobrokerajes')
                ->with('user', $user)->with('cobrekerajes', $cobrekerajes);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cobrekerajes  $cobrekerajes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = Auth::user();

            $cobrekerajes = Cobrekerajes::find($id);

            return view('admin.tecnico.slip.type_slip.slipCobrokerajes')
                ->with('user', $user)->with('cobrekerajes', $cobrekerajes);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cobrekerajes  $cobrekerajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();

            $cobrekerajes = Cobrekerajes::find($id);
            $cobrekerajes->update($request->all());

            return view('admin.tecnico.slip.type_slip.slipCobrokerajes')
                ->with('user', $user)->with('msg', 'Actualizado');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cobrekerajes  $cobrekerajes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cobrekerajes::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'eliminado');
    }
}
