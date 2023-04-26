<?php

namespace App\Http\Controllers;

use App\Models\exclusiones_selectors;
use Illuminate\Http\Request;

class ExclusionesSelectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = exclusiones_selectors::query();

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
        $cobertura = exclusiones_selectors::create($request->all());
        $cobertura->save();
        return redirect()->back()->with('success', 'La exclusion ha sido creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, exclusiones_selectors $exclusiones_selectors)
    {
        $exclusiones_selectors->update($request->all());
        $exclusiones_selectors->save();
        return redirect()->back()->with('success', 'La exclusion ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(exclusiones_selectors $exclusiones_selectors)
    {
        $exclusiones_selectors->delete();
        return redirect()->back()->with('success', 'La exclusion ha sido eliminada exitosamente.');
    }
}
