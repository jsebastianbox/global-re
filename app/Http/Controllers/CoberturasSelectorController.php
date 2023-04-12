<?php

namespace App\Http\Controllers;

use App\Models\CoberturasSelector;
use Illuminate\Http\Request;

class CoberturasSelectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = CoberturasSelector::query();

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
        $cobertura = CoberturasSelector::create($request->all());
        $cobertura->save();
        return redirect()->back()->with('success', 'La cobertura ha sido creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoberturasSelector  $coberturasSelector
     * @return \Illuminate\Http\Response
     */
    public function show(CoberturasSelector $coberturasSelector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoberturasSelector  $coberturasSelector
     * @return \Illuminate\Http\Response
     */
    public function edit(CoberturasSelector $coberturasSelector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoberturasSelector  $coberturasSelector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoberturasSelector $coberturasSelector)
    {
        $coberturasSelector->update($request->all());
        $coberturasSelector->save();
        return redirect()->back()->with('success', 'La cobertura ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoberturasSelector  $coberturasSelector
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoberturasSelector $coberturasSelector)
    {
        $coberturasSelector->delete();
        return redirect()->back()->with('success', 'La cobertura ha sido eliminada exitosamente.');
    }
}
