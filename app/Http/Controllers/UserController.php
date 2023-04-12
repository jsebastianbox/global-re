<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Slip;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $object = User::all();

        return view('admin.administrativo.usuario.index')
            ->with('compromisos', $object)
            ->with('user', $user);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.administrativo.usuario.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'sex' => $request->sex,
                'email' => $request->email,
                'country_id' => $request->country_id,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            $user->save();

            return redirect()->back()->with('success', 'Usuario creado exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th);
        }
    }

    public function show(Request $request)
    {
        $data = User::all();

        if ($request->ajax()) {
            //$data = Slip::with('type')->with('country')->get();
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

        $user = User::find($id);
        $countries =  Country::all();
        return view('admin.administrativo.usuario.edit', compact('user', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->back()->with('success', 'El usuario ha sido actualizado correctamente.');
    }

    public function destroy($id)
    {
        User::find($id)->delete($id);
        return redirect()->back()->with('success', 'Usuario eliminado.');
    }
}
