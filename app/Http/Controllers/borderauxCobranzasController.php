<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banco;
use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class borderauxCobranzasController extends Controller
{
    public function index()
    {

        $borderouxsInstallation = DB::table('borderouxes_installations')
            ->join('borderouxes', 'borderouxes_installations.borderouxes_id', '=', 'borderouxes.id')
            ->select('borderouxes_installations.*', 'borderouxes.reinsurance_broker', 'borderouxes.insured')
            ->get();

        $user = Auth::user();
        return view('admin.cartera.borderaux.listado')
            ->with('user', $user)
            ->with('borderouxsInstallation', $borderouxsInstallation);
    }

    public function management($borIntallationId)
    {
        $invoicePayment = BorderouxesInstallation::with('invoicePayment')->where('id', $borIntallationId)->first();
        $bancos = Banco::all();

        $borderaux_id = BorderouxesInstallation::where('id', $borIntallationId)->get('borderouxes_id')->first();
        $borderaux_selected = Borderoux::find($borderaux_id)->first();

        $brokers = DB::table('reinsurers')->where('reference', 'BQ')->pluck('name');
        $reinsurers = DB::table('reinsurers')->where('reference', 'RI')->pluck('name');

        // dd($borIntallationId);

        $user = Auth::user();
        return view('admin.cartera.borderaux.manejo')
            ->with('user', $user)->with('invoicePayment', $invoicePayment)
            ->with('borderaux_selected', $borderaux_selected)
            ->with('brokers', $brokers)
            ->with('reinsurers', $reinsurers)
            ->with('invoiceJSON', json_encode($invoicePayment))
            ->with('bancosJSON', json_encode($bancos));
    }
}
