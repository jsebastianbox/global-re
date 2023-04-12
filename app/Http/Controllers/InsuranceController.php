<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Insurance;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Country;
use App\Models\InsuranceBranch;
use App\Models\Reinsurers;
use Yajra\DataTables\DataTables;


class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $insurers = Insurance::all();
        return view('admin.databases.seguro.index')
            ->with('user', $user)
            ->with('insurers', json_encode($insurers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.databases.seguro.create')
            ->with('user', $user);
    }

    public function store(Request $request)
    {

        //return $request;
        try {
            $insurance = Insurance::create($request->all());
            $country = Country::find($request->country);
            if (is_numeric($request->country)) {
                $insurance->update(['country' => $country->name]);
            }
            $contact = Contact::find($request->contact);
            if (is_numeric($request->contact)) {
                $insurance->update(['contact' => $contact->name]);
            }
            $position = Position::find($request->position);
            if (is_numeric($request->position)) {
                $insurance->update(['position' => $position->name]);
            }
            $insurance->save();
            return redirect()->route('insurance.index')->with('message', 'Creado exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', 'No sea a podido crear, revisar que la información ingresada sea la correcta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Insurance::orderBy('id', 'desc')->with('branch')->with('position')->with('contact')->with('country')->get();
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
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth::user();
        $insurance = Insurance::where('id', $id)->with('position')->with('contact')->with('branch')->first();
        $position = Position::all();
        $contact = Contact::all();

        return view('admin.databases.seguro.edit', compact('user', 'insurance', 'position', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insurance = Insurance::find($id);
        $country = Country::find($request->country);

        $insurance = Insurance::find($id);
        $insurance->update($request->all());
        $country = Country::find($request->country);
        if (is_numeric($request->country)) {
            $insurance->update(['country' => $country->name]);
        }
        $position = Position::find($request->position);
        if (is_numeric($request->position)) {
            $insurance->update(['position' => $position->name]);
        }
        $contact = Contact::find($request->contact);
        if (is_numeric($request->contact)) {
            $insurance->update(['contact' => $contact->name]);
        }

        $insurance->save();
       
        return redirect()->back()->with('success', 'Informacion correctamente actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Insurance::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function selectshow(Request $request)
    {
        $search = $request->search;

        //$employees = Insurance::select('name','name')->distinct()->get();

        if ($search == '') {
            $employees = Reinsurers::where('reference', $request->reference)->select('name')->distinct()->get();
        } else {
            $employees = Reinsurers::where('reference', $request->reference)->select('name')->where('name', 'like', '%' . $search . '%')->distinct()->get();
        }

        //$response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->name,
                "text" => $employee->name
            );
        }
        $response[] = array("id" => 'new_insurace', "text" => "Otro");

        return response()->json($response);
    }
}
