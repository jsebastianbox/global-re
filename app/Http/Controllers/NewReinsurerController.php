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

class NewReinsurerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $countries = Country::all();
        $references = ReinsurerReferences::all();
        $position = Position::all();
        $contacts = Contact::all();
        $reinsurers = DB::table('reinsurers')->where('reference', 'RI')->get();

        return view('admin.databases.reaseguro.index')
            ->with('user', $user)
            ->with('reinsurers', $reinsurers)
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
        $reinsurers = Reinsurers::where('reference', 'RI')->get();

        return view('admin.databases.reaseguro.create')
            ->with('user', $user)
            ->with('reinsurers', $reinsurers)
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
        $reinsurers = Reinsurers::findOrFail($id);

        return view('admin.databases.reaseguro.edit', compact('user', 'position', 'contact', 'countries', 'references', 'reinsurers'));
    }

    public function store(Request $request)
    {
        $reinsurer = Reinsurers::create($request->all());
        $reinsurer->reference = "RI";
        $reinsurer->save();
        return redirect(url('admin.databases.reaseguro.index'));
    }

    public function update(Request $request, $id)
    {
        $update = Reinsurers::find($id);
        $update->reference = "RI";
        $update->update($request->all());
        return redirect()->back()->with('message', 'Información actualizada correctamente');
    }

    public function destroy(Reinsurers $lloyd)
    {
        $lloyd->delete($lloyd);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
