<?php

namespace App\Http\Controllers;

use App\Models\Clausulas_selector;
use Illuminate\Http\Request;

class ClausulasSelectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Clausulas_selector::query();

        if ($request->has('main_branch')) {
            $query->where('main_branch', $request->query('main_branch'));
        }

        if ($request->has('sub_branch')) {
            $subBranch = $request->query('sub_branch');
            if ($subBranch === 'all') {
                $query->where('main_branch', $request->query('main_branch'));
            } else {
                $query->where('sub_branch', $subBranch);
            }
        }

        if ($request->has('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('main_branch', 'like', '%' . $request->q . '%')
                    ->orWhere('sub_branch', 'like', '%' . $request->q . '%');
            });
        }

        $clausulas = $query->get();

        return response()->json(['data' => $clausulas]);
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
        $clausulas_selector = Clausulas_selector;
        $clausulas_selector::create($request->all());
        $clausulas_selector->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clausulas_selector  $clausulas_selector
     * @return \Illuminate\Http\Response
     */
    public function show(Clausulas_selector $clausulas_selector)
    {
        return redirect()->back()->with($clausulas_selector);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clausulas_selector  $clausulas_selector
     * @return \Illuminate\Http\Response
     */
    public function edit(Clausulas_selector $clausulas_selector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clausulas_selector  $clausulas_selector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clausulas_selector $clausulas_selector)
    {
        $clausulas_selector->update($request->all());
        $clausulas_selector->save();

        //TODO: Cambiar a vista de cláusulas
        return redirect()->back()->with('success', 'Cláusula editada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clausulas_selector  $clausulas_selector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clausulas_selector $clausulas_selector)
    {
        $clausulas_selector->delete();
        return redirect()->back()->with('success', 'Cláusula eliminada con éxito.');
    }
}
