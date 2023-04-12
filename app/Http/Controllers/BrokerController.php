<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\ReinsurerReferences;
use App\Models\Reinsurers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrokerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $position = Position::all();
        $contacts = Contact::all();
        $brokers = DB::table('reinsurers')->where('reference', 'BQ')->orderBy('id')->get();

        return view('admin.databases.broker.index')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('brokers', $brokers)
            ->with('countries', $countries);
    }

    public function create()
    {
        $position = Position::all();
        $contacts = Contact::all();
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $brokers = DB::table('reinsurers')->where('reference', 'BQ')->get();

        return view('admin.databases.broker.create')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('brokers', $brokers)
            ->with('countries', $countries);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $position = Position::all();
        $contacts = Contact::all();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $brokers = Reinsurers::findOrFail($id);

        return view('admin.databases.broker.edit')
            ->with('user', $user)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('brokers', $brokers)
            ->with('countries', $countries);
    }

    public function store(Request $request)
    {

        $broker = Reinsurers::create($request->all());
        $broker->reference = "BQ";

        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $broker->country_id = $country->name;
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $broker->position_id = $position->name;
        }
        $contact = Contact::find($request->contact_id);
        if (is_numeric($request->contact_id)) {
            $broker->contact_id = $contact->name;
        }

        $broker->save();

        return redirect()->back()->with('message', 'Broker creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $broker = Reinsurers::find($id);
        $broker->reference = 'BQ';
        $broker->update($request->all());

        if (is_numeric($request->country_id)) {
            $country = Country::find($request->country_id);
            $broker->country_id = $country->name;
        }

        if ($request->has('position_id') && is_numeric($request->position_id)) {
            // dd($request->position_id);
            $position = Position::find($request->position_id);
            $broker->position_id = $position->name;
        }

        if ($request->has('contact')) {
            $broker->contact_id = $request->contact;
            if (is_numeric($request->contact)) {
                $broker->contact_id = Contact::find($request->contact)->name;
            }
            // dd($request->contact);
        }

        $broker->save();

        return redirect()->back()->with('message', 'Información actualizado correctamente');
    }


    public function delete(Reinsurers $id)
    {

        Reinsurers::find($id)->delete($id);

        return redirect()->view('admin.databases.broker.index')
            ->with(['message' => "Agente eliminado correctamente"]);
    }
}
