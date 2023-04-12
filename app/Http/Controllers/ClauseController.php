<?php

namespace App\Http\Controllers;

use App\Models\ClausulasInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ClauseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $clausulas = DB::table('clausulas_inventories')->get();
        return view('admin.databases.clausulas.index')
            ->with('user', $user)
            ->with('clausulas', json_encode($clausulas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('admin.databases.clausulas.create')
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
        ClausulasInventory::create($request->all());

        return redirect()->route('clausulas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        if ($request->ajax()) {
            $data = ClausulasInventory::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $clausula = ClausulasInventory::where('id', $id)->first();

        return view('admin.databases.clausulas.edit')
            ->with('user', $user)
            ->with('clausula', $clausula);
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
        $update = ClausulasInventory::find($id);
        $update->update($request->all());

        return redirect()->back()->with('message', 'Información actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClausulasInventory::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully'
        ]);
    }
}
