<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banco;
use Illuminate\Http\Request;

class BankApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $banks = Banco::all();
            return response()->json($banks);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Error: ' . $th]);
        }
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
            Banco::create($request->all());
            $bank = Banco::where('name', $request->name)->get();
            return response()->json(['msg'=>'Store successful', 'data'=>$bank]);
        } catch (\Throwable $th) {
            return response()->json('Error: ' . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $banks = Banco::all();
            return response()->json($banks);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banco  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Banco $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $bank = Banco::find($id);
            $bank->update($request->all());

            return response()->json([
                'msg' => 'update',
                'object' => $bank
            ], 200);
        } catch (\Exception $th) {
            return response()->json(['msg' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Banco::findOrFail($id)->delete();
            return response()->json(['msg' => 'delete']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
