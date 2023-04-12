<?php

namespace App\Http\Controllers;

use App\Models\ClienteDirecto;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\Sercorp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientesDirectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $clients = DB::table('cliente_directos')->get();
        $countries = Country::all();
        return view('admin.databases.clientes_directos.index')
            ->with('user', $user)
            ->with('clients', json_encode($clients))
            ->with('countries', json_encode($countries));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('admin.databases.clientes_directos.create')
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
        $cliente = ClienteDirecto::create($request->all());
        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $cliente->country_id = $country->name;
        }
        $cliente->reference = "Directo";
        $country = Country::find($request->country);
        if (is_numeric($request->country)) {
            $cliente->update(['country' => $country->name]);
        }
        $contact = Contact::find($request->contact);
        if (is_numeric($request->contact)) {
            $cliente->update(['contact' => $contact->name]);
        }
        $position = Position::find($request->position);
        if (is_numeric($request->position)) {
            $cliente->update(['position' => $position->name]);
        }
        $cliente->save();

        return redirect()->route('clientes_directos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes_directos  $clientes_directos
     * @return \Illuminate\Http\Response
     */
    public function show(Sercorp $clientes_directos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes_directos  $clientes_directos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $cliente_directo = ClienteDirecto::where('id', $id)->first();

        return view('admin.databases.clientes_directos.edit')
            ->with('user', $user)
            ->with('cliente_directo', $cliente_directo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes_directos  $clientes_directos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = ClienteDirecto::find($id);
        $cliente->update($request->all());
        $cliente->reference = 'Directo';
        $country = Country::find($request->country);
        if (is_numeric($request->country)) {
            $cliente->update(['country' => $country->name]);
        }
        $position = Position::find($request->position);
        if (is_numeric($request->position)) {
            $cliente->update(['position' => $position->name]);
        }
        $contact = Contact::find($request->contact);
        if (is_numeric($request->contact)) {
            $cliente->update(['contact' => $contact->name]);
        }

        $cliente->save();

        return redirect()->back()->with('message', 'Información actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes_directos  $clientes_directos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClienteDirecto::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully'
        ]);
    }
}
