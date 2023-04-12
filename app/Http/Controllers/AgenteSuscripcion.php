<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\ReinsurerReferences;
use App\Models\Reinsurers;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgenteSuscripcion extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $position = Position::all();
        $contacts = Contact::all();
        $agentes = DB::table('reinsurers')->where('reference', 'AG')->get();

        return view('admin.databases.agente_suscripcion.index')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('agentes', $agentes)
            ->with('countries', $countries);
    }

    public function create()
    {
        $position = Position::all();
        $contacts = Contact::all();
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $agentes = DB::table('reinsurers')->where('reference', 'AG')->get();

        return view('admin.databases.agente_suscripcion.create')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('agentes', $agentes)
            ->with('countries', $countries);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $position = Position::all();
        $contacts = Contact::all();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $agentes = Reinsurers::findOrFail($id);

        return view('admin.databases.agente_suscripcion.edit')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('agentes', $agentes)
            ->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $agente = Reinsurers::create($request->all());
        $agente->reference = "AG";
        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $agente->update(['country_id' => $country->name]);
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $agente->update(['position_id' => $position->name]);
        }
        $contact = Contact::find($request->contact_id);
        if (is_numeric($request->contact_id)) {
            $agente->update(['contact_id' => $contact->name]);
        }

        $agente->save();

        return redirect()->route('agentes.index')
        ->with('message', 'Agente creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $agente = Reinsurers::find($id);
        $agente->update($request->all());
        $agente->reference = 'AG';

        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $agente->update(['country_id' => $country->name]);
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $agente->update(['position_id' => $position->name]);
        }
        // $contact = Contact::find($request->contact);
        if ($request->has('contact')) {
            $agente->update(['contact_id' => $request->contact]);
            if (is_numeric($request->contact)) {
                $contact = Contact::find($request->contact)->name;
                $agente->update(['contact_id' => $contact]);
            }
            // dd($request->contact);
        }

        $agente->save();
        return redirect()->back()->with('success', 'El agente ha sido actualizado correctamente');
    }


    public function delete(Reinsurers $id)
    {

        Reinsurers::find($id)->delete($id);

        return redirect()->view('admin.databases.agente_suscripcion.index')
            ->with(['message' => "Agente eliminado correctamente"]);
    }
}
