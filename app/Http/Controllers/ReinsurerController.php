<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinsurers;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\ReinsurerReferences;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReinsurerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reinsurers = DB::table('reinsurers')->where('reference', 'RI')->get();
        $brokers = DB::table('reinsurers')->where('reference', 'BQ')->get();
        $lloyds = DB::table('reinsurers')->where('reference', 'Lloyds')->get();
        $ag = DB::table('reinsurers')->where('reference', 'AG')->get();
        $insurances = DB::table('insurances')->get();
        $contacts =  Contact::all();
        $position =  Position::all();
        $countries =  Country::all();
        $reference = ReinsurerReferences::all();
        return view('admin.databases.reaseguro.index')
            ->with('user', $user)
            ->with('reinsurers', json_encode($reinsurers))
            ->with('brokers', json_encode($brokers))
            ->with('lloyds', json_encode($lloyds))
            ->with('ag', json_encode($ag))
            ->with('contacts', json_encode($contacts))
            ->with('position', json_encode($position))
            ->with('countries', json_encode($countries))
            ->with('references', json_encode($reference))
            ->with('insurances', json_encode($insurances));
    }


    public function create()
    {
        $user = Auth::user();
        return view('admin.databases.reaseguro.create')
            ->with('user', $user);
    }

    public function store(Request $request)
    {
        $reinsurer = Reinsurers::create($request->all());
        $reinsurer->reference = 'RI';
        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $reinsurer->update(['country_id' => $country->name]);
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $reinsurer->update(['position_id' => $position->name]);
        }
        $contact = Contact::find($request->contact);
        if (is_numeric($request->contact)) {
            $reinsurer->update(['contact_id' => $contact->name]);
        }
        $reinsurer->save();

        return redirect()->route('reinsurer.index')->with('message', 'Agente creado correctamente');
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Reinsurers::orderBy('id', 'desc')
                ->with('bussines')->with('position')->with('contact')
                ->with('country')->get();

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

    public function edit($id)
    {
        $user = Auth::user();
        $reinsurer = Reinsurers::where('id', $id)
            ->with('bussines')
            ->with('position')
            ->with('excluye')
            ->with('region')
            //->with('country')
            ->first();

        return view('admin.databases.reaseguro.edit')
            ->with('user', $user)->with('reinsurer', $reinsurer);
    }

    public function update(Request $request, $id)
    {
        $reinsurer = Reinsurers::find($id);
        $reinsurer->update($request->all());

        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $reinsurer->update(['country_id' => $country->name]);
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $reinsurer->update(['position_id' => $position->name]);
        }

        if ($request->has('contact')) {
            $reinsurer->update(['contact_id' => $request->contact]);
            if (is_numeric($request->contact)) {
                $reinsurer->update(['contact_id' => Contact::find($request->contact)->name]);
            }
        }

        $reinsurer->save();

        return redirect()->back()->with('message', 'Información actualizada correctamente');
    }

    public function destroy($id)
    {
        Reinsurers::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
