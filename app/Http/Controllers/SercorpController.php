<?php

namespace App\Http\Controllers;

use App\Models\Awardee;
use App\Models\Country;
use App\Models\Entity;
use App\Models\Sercorp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class SercorpController extends Controller
{


    public function index()
    {

        $user = Auth::user();
        $sercops = Sercorp::all();


        return view('admin.administrativo.sercop')
            ->with('user', $user)
            /* ->with('sercops', $sercops) */
            ->with('sercop', json_encode($sercops));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();


        return view('admin.databases.sercorp.create')
            ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Sercorp::create($request->all());
        /* $country = Country::find($request->country_id);
        $sercorp->update(['country_id' => $country->name]); */

        return redirect('/admin/administrativo/sercop');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $user = Auth::user();
        $sercops = Sercorp::all();
        
        if ($request->ajax()) {
            $data = Sercorp::with('awardee')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.databases.clientes_directos')
        ->with('sercops', $sercops) 
        ->with('user', $user);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sercorp = Sercorp::where('id', $id)->with('awardee')->with('entity')->first();
        $user = Auth::user();
        return view('admin.databases.sercorp.edit')
            ->with('user', $user)->with('sercorp', $sercorp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $sercorp = Sercorp::find($id);
            $sercorp->update($request->all());

            /* if (is_numeric($request->country_id)) {
                $country = Country::find($request->country_id);
                $sercorp->update(['country_id' => $country->name]);
            }*/

        } catch (\Throwable $th) {
            //return $th;
            return redirect()->back()->with('warning', 'No sea a podido crear, revisar que la información ingresada sea la correcta');
        }

        return redirect()->back()->with('message', 'Información actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sercorp  $sercorp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sercorp::findOrFail($id)->delete();

        //return redirect()->back()->with('success', 'your message');
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
