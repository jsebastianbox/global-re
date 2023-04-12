<?php

namespace App\Http\Controllers;

use App\Models\BorderouxesInstallation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorderouxInstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borderoux = BorderouxesInstallation::with('borderoxes')->get();
        $user = Auth::user();
        return view('admin.tecnico.cobrokerajes.borderoux')
            ->with('user', $user)->with('borderoux', $borderoux);
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
            //BorderouxesInstallation::create($request->all());

            foreach ($request->all() as $key) {
                BorderouxesInstallation::create($key);
            }

            return redirect('/admin/tecnico/cobrokerajes/borderoux')
                ->with('user', $user);
        } catch (\Throwable $th) {
            dd('todo lo que pudo salir mal ocurrio :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $borderoux = BorderouxesInstallation::with('borderoxes')->find($id);

        return view('admin.tecnico.cobrokerajes.borderoux')
            ->with('user', $user)->with('borderoux', $borderoux);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function edit(BorderouxesInstallation $borderouxesInstallation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();

            $borderoux = BorderouxesInstallation::find($id);
            $borderoux->update($request->all());

            return view('admin.tecnico.cobrokerajes.borderoux')
                ->with('user', $user)->with('msg', 'Actualizado');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorderouxesInstallation  $borderouxesInstallation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BorderouxesInstallation::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'eliminado');
    }
}
