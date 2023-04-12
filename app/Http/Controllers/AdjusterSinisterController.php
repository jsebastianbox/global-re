<?php

namespace App\Http\Controllers;

use App\Models\AdjusterSinister;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Position;
use App\Models\ReinsurerReferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdjusterSinisterController extends Controller
{
    public function index()
    {
        //$employees = AdjusterSinister::select('name')->distinct()->get();
        $user = Auth::user();
        $contacts = Contact::all();
        $position = Position::all();
        $references = ReinsurerReferences::all();
        $countries = Country::all();
        $adjusters = AdjusterSinister::all();

        return view('admin.databases.adjustador.index', compact('user'))
            ->with('position', $position)
            ->with('references', $references)
            ->with('countries', $countries)
            ->with('contacts', $contacts)
            ->with('adjusters', $adjusters);
    }

    public function create()
    {

        $position = Position::all();
        $contact = Contact::all();
        $user = Auth::user();

        return view('admin.databases.adjustador.create', compact('user', 'position', 'contact'));
    }

    public function store(Request $request)
    {

        $adjuster = AdjusterSinister::create($request->all());
        $country = Country::find($request->country_id);

        $adjuster->country_id = $country->name;
        $adjuster->reference = "Ajustador";
        // dd($adjuster);
        $adjuster->save();

        return redirect()->route('adjuster.index');
    }

    public function show(Request $request)
    {
        $data = AdjusterSinister::get();

        if ($request->ajax()) {
            $data = AdjusterSinister::get();
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
        $adjuster = AdjusterSinister::where('id', $id)->with('position')->with('contact')->with('country')->first();
        $position = Position::all();
        $contact = Contact::all();

        return view('admin.databases.adjustador.edit', compact('user', 'adjuster', 'position', 'contact'));
    }

    public function update(Request $request, $id)
    {

        $adjuster = AdjusterSinister::find($id);
        $adjuster->update($request->all());
        $adjuster->reference = 'Ajustador';
        $country = Country::find($request->country_id);
        if (is_numeric($request->country_id)) {
            $adjuster->update(['country_id' => $country->name]);
        }
        $position = Position::find($request->position_id);
        if (is_numeric($request->position_id)) {
            $adjuster->update(['position_id' => $position->name]);
        }
        $contact = Contact::find($request->contact_id);
        if (is_numeric($request->contact_id)) {
            $adjuster->update(['contact_id' => $contact->name]);
        }

        $adjuster->save();

        return redirect()->back()->with('message', 'Información actualizado correctamente');
    }

    public function destroy($id)
    {
        AdjusterSinister::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
