<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Position;
use App\Models\ReinsurerReferences;
use Illuminate\Http\Request;
use App\Models\Reinsurers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReinsurerRecords extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reinsurer_query = DB::table('reinsurers')->select('name')->distinct();
        $insurance_query = DB::table('insurances')->select('name')->distinct();

        if ($request->input('reference') !== "insurers") {
            if (!empty($request->input('search'))) {
                $reinsurer_query->where('name', 'like', '%' . $request->input('search') . '%');
            }
            $reinsurers = $reinsurer_query->get();
            return response()->json(['data' => $reinsurers]);
        } elseif ($request->input('reference') === "insurers") {
            if (!empty($request->input('search'))) {
                $insurance_query->where('name', 'like', '%' . $request->input('search') . '%');
            }
            $insurers = $insurance_query->get();
            return response()->json(['data' => $insurers]);
        } else {
            $reinsurers = $reinsurer_query->get();
            return response()->json(['data' => $reinsurers]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::get_current_user();
        $lloyds = Reinsurers::where('reference', 'Lloyds')->get();
        $countries =  Country::all();
        $references =  ReinsurerReferences::all();
        $positions = Position::all();

        return view('admin.databases.lloyds.create')
            ->with('user', $user)
            ->with('countries', $countries)
            ->with('references', $references)
            ->with('positions', $positions)
            ->with('lloyds', $lloyds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        $update = Reinsurers::find($id);

        if ($request->has('country_id') && $request->country_id != '' && $request->country_id != null) {
            $country = Country::find($request->country_id);
            dd($country->name);
            $update->update(array_merge($request->all(), [$request->country_id => $country->name]));
            return redirect()->back()->with('message', 'Información actualizada correctamente');
        }
        dd(Country::find($request->country_id)->name);
        $update->update($request->all());
        $update->save();

        return redirect()->back()->with('message', 'Información actualizada correctamente');
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
