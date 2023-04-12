<?php

namespace App\Http\Controllers;

use App\Models\Borderoux;
use App\Models\Sercorp;
use App\Models\Slip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Api\BorderouxesControllerApi;
use App\Models\ClausulasInventory;
use App\Models\Country;
use App\Models\File;
use App\Models\Reinsurers;
use App\Models\SlipStatus;
use App\Models\TypeCoverage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        $user = Auth::user();
        return redirect()->route('dashboard')
            ->with('user', $user);
    }
    public function ajustadores()
    {
        $user = Auth::user();
        return view('admin.databases.ajustadores')
            ->with('user', $user);
    }
    public function dashboard()
    {
        $user = Auth::user();
        $users = User::all();
        $slips = Slip::all();
        $sercops = Sercorp::all();
        $brokers = Reinsurers::all();

        return view('admin.dashboard')
            ->with('users', $users)
            ->with('slips', $slips)
            ->with('sercops', $sercops)
            ->with('brokers', $brokers)
            ->with('user', $user);
    }
    public function asegurador()
    {
        $user = Auth::user();
        return view('admin.databases.aseguradores')
            ->with('user', $user);
    }
    public function banks()
    {
        $user = Auth::user();

        return view('admin.databases.banks')
            ->with('user', $user);
    }
    public function reasegurador()
    {
        $user = Auth::user();
        return view('admin.databases.reaseguradores')
            ->with('user', $user);
    }
    public function brokerRe()
    {
        $user = Auth::user();
        $reinsurers = DB::table('reinsurers')->where('reference', 'RI')->get();
        $brokers = DB::table('reinsurers')->where('reference', 'BQ')->get();
        $lloyds = DB::table('reinsurers')->where('reference', 'Lloyds')->get();
        $ag = DB::table('reinsurers')->where('reference', 'AG')->get();
        $insurances = DB::table('insurances')->get();
        return view('admin.databases.broker.index')
            ->with('user', $user)
            ->with('brokers', $brokers);
    }
    public function clienteDirecto()
    {
        $user = Auth::user();
        $sercops = Sercorp::all();
        $clients = DB::table('cliente_directos')->get();
        return view('admin.databases.clientes_directos')
            ->with('clients', $clients)
            ->with('user', $user)
            ->with('clients', json_encode($clients));
    }
    // Adminsitrativo
    public function comparativo()
    {
        $user = Auth::user();
        return view('admin.administrativo.comparativo')
            ->with('user', $user);
    }
    public function cotizaciones_en_curso()
    {
        $slips = Slip::all();
        $user = Auth::user();
        $countries = Country::all()->pluck('name', 'id')->toArray();
        $type_coverage = TypeCoverage::all()->pluck('name', 'id')->toArray();
        $slip_statuses = SlipStatus::all()->pluck('slip_status', 'id')->toArray();

        return view('admin.administrativo.cotizaciones_en_curso')
            ->with('user', $user)
            ->with('slips', $slips)
            ->with('countries', $countries)
            ->with('type_coverage', $type_coverage)
            ->with('slip_statuses', $slip_statuses);
    }
    public function produccion()
    {
        $user = Auth::user();
        return view('admin.administrativo.produccion')
            ->with('user', $user);
    }
    public function sercop()
    {
        $user = Auth::user();
        $sercops = Sercorp::all();
        return view('admin.administrativo.sercop')
            ->with('user', $user)
            ->with('sercops', $sercops);
    }
    public function usuarios()
    {
        $user = Auth::user();
        return view('admin.administrativo.usuarios')
            ->with('user', $user);
    }
    public function biblioteca()
    {
        $user = Auth::user();
        return view('admin.administrativo.biblioteca')
            ->with('user', $user);
    }

    // Comercial

    //cambiado a compromisoController
    /* public function compromiso()
    {
        $user = Auth::user();
        return view('admin.comercial.compromiso')
            ->with('user', $user);
    } */

    public function requerimiento()
    {
        $user = Auth::user();
        return view('admin.comercial.requerimiento')
            ->with('user', $user);
    }

    //Tecnico
    public function slip()
    {
        $user = Auth::user();
        return view('admin.tecnico.slip_cotizacion')
            ->with('user', $user);
    }

    // public function gestion()
    // {
    //     $user = Auth::user();
    //     return view('admin.tecnico.gestion_reaseguros')
    //         ->with('user', $user);
    // }
    public function calculoPrimas()
    {
        $user = Auth::user();
        return view('admin.tecnico.calculo_prima')
            ->with('user', $user);
    }

    public function orden()
    {
        $user = Auth::user();
        return view('admin.tecnico.orden')
            ->with('user', $user);
    }

    public function movimiento()
    {
        $user = Auth::user();
        return view('admin.tecnico.movimientos')
            ->with('user', $user);
    }
    //Tenico - prod facultativo
    public function facultativoEmision()
    {
        $user = Auth::user();
        return view('admin.tecnico.produccion_facultativo.emision')
            ->with('user', $user);
    }
    //Tenico - cobrokerajes
    public function cobrokerajeForm()
    {
        $user = Auth::user();
        $brokers = DB::table('reinsurers')->where('reference', "BQ")->distinct()->pluck('name');

        return view('admin.tecnico.slip.type_slip.slipBorderaux')
            ->with('user', $user)
            ->with('brokers', $brokers);
    }
    public function cobrokerajesBorderoux()
    {
        $borderouxs = Borderoux::with('assignor')->with('borderouxInstallation')->get();

        $user = Auth::user();
        return view('admin.tecnico.cobrokerajes.borderoux')
            ->with('user', $user)->with('borderouxs', $borderouxs);
    }

    public function cobrokerajesReporteria()
    {

        $user = Auth::user();
        return view('admin.tecnico.cobrokerajes.reporteria')
            ->with('user', $user);
    }

    // Siniestros

    public function apertura()
    {
        $user = Auth::user();
        return view('admin.siniestros.apertura')
            ->with('user', $user);
    }

    public function liquidacion()
    {
        $user = Auth::user();
        return view('admin.siniestros.Liquidacion')
            ->with('user', $user);
    }

    public function pago()
    {
        $user = Auth::user();
        return view('admin.siniestros.pago')
            ->with('user', $user);
    }

    public function bordero()
    {
        $user = Auth::user();
        return view('admin.siniestros.bordero')
            ->with('user', $user);
    }

    public function estados()
    {
        $user = Auth::user();
        return view('admin.reportes_siniestros.estados')
            ->with('user', $user);
    }

    // Cartera y cobranzas

    public function carteraProduccion()
    {
        $user = Auth::user();
        return view('admin.cartera.produccion')
            ->with('user', $user);
    }

    public function carteraSiniestro()
    {
        $user = Auth::user();
        return view('admin.cartera.siniestros')
            ->with('user', $user);
    }

    // Contratos automaticos

    public function perfiles()
    {
        $user = Auth::user();
        return view('admin.Contratos.perfiles')
            ->with('user', $user);
    }

    public function proporcionales()
    {
        $user = Auth::user();
        return view('admin.Contratos.proporcionales')
            ->with('user', $user);
    }

    public function noProporcionales()
    {
        $user = Auth::user();
        return view('admin.Contratos.noproporcionales')
            ->with('user', $user);
    }

    public function catastrofico()
    {
        $user = Auth::user();
        return view('admin.Contratos.catastroficos')
            ->with('user', $user);
    }

    // Produccion

    public function reporteProduccion()
    {
        $user = Auth::user();
        return view('admin.produccion.estados')
            ->with('user', $user);
    }

    //Módulo de emisión de co-brokerajes
    public function reporteBorderaux()
    {
        $user = Auth::user();
        $records = DB::table('borderouxes')->get();

        // dd($records);

        return view('admin.reportes.co-brokeraje')
            ->with('user', $user)
            ->with('records', $records);
    }

    // Siniestros

    public function reporteSiniestro()
    {
        $user = Auth::user();
        return view('admin.reportes_siniestros.estados')
            ->with('user', $user);
    }

    // Graficos dinamicos

    public function mapcollection()
    {
        $user = Auth::user();
        return view('admin.grafico.mapacollection')
            ->with('user', $user);
    }


    // Cotizaciones


    // Vencimientos


    //download
    // public function download($fileId)
    // {
    //     $file = File::find($fileId);
    //     $filePath = storage_path('file' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'Clausules' . DIRECTORY_SEPARATOR . $file->path);

    //     return response()->download($filePath);
    // }
    public function download($rowId)
    {
        $clausula = ClausulasInventory::find($rowId);

        if (!$clausula) {
            abort(404, 'Clausula not found');
        }

        $files = scandir(public_path('file' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'Clausules'));

        $filename = null;
        foreach ($files as $file) {
            if (strpos($file, $clausula->nomenclatura) === 0) {
                $filename = $file;
                break;
            }
        }

        if (!$filename) {
            abort(404, 'File not found');
        }

        $filePath = public_path('file' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'Clausules' . DIRECTORY_SEPARATOR . $filename);

        return response()->download($filePath);
    }
}
