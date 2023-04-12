<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\Region;
use App\Models\ReinsurerReferences;
use App\Models\Reinsurers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Lloyds extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $position = Position::all();
        $contacts = Contact::all();
        $lloyds = DB::table('reinsurers')->where('reference', 'Lloyds')->get();

        return view('admin.databases.lloyds.index')
            ->with('user', $user)
            ->with('lloyds', $lloyds)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('countries', $countries);
    }

    public function create()
    {
        $position = Position::all();
        $contacts = Contact::all();
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $lloyds = Reinsurers::where('reference', 'Lloyds')->get();

        return view('admin.databases.lloyds.create')
            ->with('user', $user)
            ->with('lloyds', $lloyds)
            ->with('position', $position)
            ->with('references', $references)
            ->with('contacts', $contacts)
            ->with('countries', $countries);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $position = Position::all();
        $contact = Contact::all();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $lloyds = Reinsurers::findOrFail($id);

        return view('admin.databases.lloyds.edit', compact('user', 'position', 'contact', 'countries', 'references', 'lloyds'));
    }

    public function store(Request $request)
    {
        $lloyd = Reinsurers::create($request->all());
        $lloyd->country_id = Country::find($request->country_id)->name;
        $lloyd->reference = "Lloyds";

        if (is_numeric($request->contact_id)) {
            $lloyd->contact_id = Contact::find($request->contact_id)->name;
        }

        if (is_numeric($request->position_id)) {
            $lloyd->position_id = Position::find($request->position_id)->name;
            // dd(Position::find($request->position_id)->name);
        }

        $lloyd->save();
        return redirect()->route('lloyds.index');
    }

    public function update(Request $request, $id)
    {
        $update = Reinsurers::find($id);
        if ($request->has('country_id') && $request->country_id != '' && $request->country_id != null) {
            $update->update($request->all());
            $update->country_id = $request->country_id;
            $update->save();
            // return redirect()->back()->with('message', 'Información actualizada correctamente');
        }

        if (is_numeric($request->country_id)) {
            $country = Country::find($request->country_id);
            $update->country_id = $country->name;
        }

        if ($request->has('position_id')) {
            if (is_numeric($request->position_id)) {
                $position = Position::find($request->position_id);
                $update->position_id = $position->name;
            }
        }

        if ($request->has('contact_id')) {
            $update->contact_id = $request->contact_id;
            if (is_numeric($request->contact_id)) {
                $update->contact_id = Contact::find($request->contact_id)->name;
            }
            // dd($request->contact);
        }

        $update->save();

        return redirect()->back()->with('message', 'Información actualizada correctamente');
    }

    public function destroy(Reinsurers $lloyd)
    {
        $lloyd->delete();
        return redirect()->route('lloyds.index')->with('success', 'Record deleted successfully!');
    }
}
