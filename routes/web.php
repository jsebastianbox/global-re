<?php

use App\Http\Controllers\AdjusterController;
use App\Http\Controllers\AdjusterSinisterController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BorderouxController;
use App\Http\Controllers\BorderouxInstallationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClauseController;
use App\Http\Controllers\Clientes_directosController;
use App\Http\Controllers\ClientesDirectosController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompromisoController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ExcluyeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReinsurerBusinessController;
use App\Http\Controllers\ReinsurerController;
use App\Http\Controllers\ReinsurerTypeController;
use App\Http\Controllers\SercorpController;
use App\Http\Controllers\SlipFireController;
use App\Http\Controllers\SlipLifeController;
use App\Http\Controllers\UserController;
use App\Models\AdjusterSinister;
use App\Models\Insurance;
use App\Models\Sercorp;
use App\Models\SlipLife;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicePaymentController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SlipController;
use App\Models\Borderoux;
use App\Models\Cobrekerajes;
use App\Models\Slip;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    // Administrativo
    Route::get('/admin/administrativo/comparativo', [App\Http\Controllers\HomeController::class, 'comparativo'])->name('comparativo');
    Route::get('/admin/administrativo/cotizaciones_en_curso', [App\Http\Controllers\HomeController::class, 'cotizaciones_en_curso'])->name('cotizaciones_en_curso');
    Route::get('/admin/administrativo/produccion', [App\Http\Controllers\HomeController::class, 'produccion'])->name('produccion');
    Route::get('/admin/administrativo/sercop', [App\Http\Controllers\HomeController::class, 'sercop'])->name('sercop');
    Route::get('/admin/administrativo/usuarios', [App\Http\Controllers\HomeController::class, 'usuarios'])->name('administrativo.usuarios');
    // Route::get('/admin/administrativo/biblioteca', [App\Http\Controllers\HomeController::class, 'biblioteca'])->name('biblioteca');
    //La biblioteca contiene las clausulas
    Route::get('/admin/administrativo/biblioteca', [App\Http\Controllers\HomeController::class, 'biblioteca'])->name('biblioteca');
    // Bases de datos
    Route::get('/admin/database/ajustadores', [App\Http\Controllers\HomeController::class, 'ajustadores'])->name('ajustador');
    Route::get('/admin/database/asegurador', [App\Http\Controllers\HomeController::class, 'asegurador'])->name('asegurador');
    Route::resource('/bancos', BankController::class);
    Route::resource('/clausulas', ClauseController::class);
    Route::resource('/clientes_directos', ClientesDirectosController::class );
    Route::get('/admin/database/brokers_reaseguradores', [App\Http\Controllers\HomeController::class, 'brokerRe'])->name('broker_reasegurador');
    Route::get('/admin/database/reasegurador', [App\Http\Controllers\HomeController::class, 'reasegurador'])->name('reasegurador');

    Route::get('/admin/database/lloyds', [App\Http\Controllers\Lloyds::class, 'index'])->name('lloyds.index');
    Route::get('/admin/database/lloyds/create', [App\Http\Controllers\Lloyds::class, 'create'])->name('lloyds.create');
    Route::post('/admin/database/lloyds/store', [App\Http\Controllers\Lloyds::class, 'store'])->name('lloyds.store');
    Route::get('/admin/database/edit/lloyds/{id}', [App\Http\Controllers\Lloyds::class, 'edit'])->name('lloyds.edit');
    Route::put('/admin/database/update/lloyds/{id}', [App\Http\Controllers\Lloyds::class, 'update'])->name('lloyds.update');

    Route::get('/admin/database/agentes', [App\Http\Controllers\AgenteSuscripcion::class, 'index'])->name('agentes.index');
    Route::post('/admin/database/agentes/store', [App\Http\Controllers\AgenteSuscripcion::class, 'store'])->name('agentes.store');
    Route::get('/admin/database/agentes/create', [App\Http\Controllers\AgenteSuscripcion::class, 'create'])->name('agentes.create');
    Route::get('/admin/database/agentes/edit/{id}', [App\Http\Controllers\AgenteSuscripcion::class, 'edit'])->name('agentes.edit');
    Route::put('/admin/database/agentes/update/{id}', [App\Http\Controllers\AgenteSuscripcion::class, 'update'])->name('agentes.update');

    Route::get('/admin/database/brokers', [App\Http\Controllers\BrokerController::class, 'index'])->name('brokers.index');
    Route::post('/admin/database/brokers/store', [App\Http\Controllers\BrokerController::class, 'store'])->name('brokers.store');
    Route::get('/admin/database/brokers/create', [App\Http\Controllers\BrokerController::class, 'create'])->name('brokers.create');
    Route::get('/admin/database/brokers/edit/{id}', [App\Http\Controllers\BrokerController::class, 'edit'])->name('brokers.edit');
    Route::put('/admin/database/brokers/update/{id}', [App\Http\Controllers\BrokerController::class, 'update'])->name('brokers.update');

    Route::get('/admin/database/reinsurers', [App\Http\Controllers\NewReinsurerController::class, 'index'])->name('reinsurers.index');
    Route::post('/admin/database/reinsurers/store', [App\Http\Controllers\NewReinsurerController::class, 'store'])->name('reinsurers.store');
    Route::get('/admin/database/reinsurers/create', [App\Http\Controllers\NewReinsurerController::class, 'create'])->name('reinsurers.create');
    Route::get('/admin/database/reinsurers/edit/{id}', [App\Http\Controllers\NewReinsurerController::class, 'edit'])->name('reinsurers.edit');
    Route::put('/admin/database/reinsurers/update/{id}', [App\Http\Controllers\NewReinsurerController::class, 'update'])->name('reinsurers.update');

    // Comercial
    Route::get('/admin/comercial/new_compromiso', [App\Http\Controllers\CompromisoController::class, 'compromiso'])->name('compromiso');
    Route::get('/admin/comercial/compromisoData', [App\Http\Controllers\CompromisoController::class, 'compromisoD'])->name('compromisoData');
    Route::get('/admin/comercial/compromisos', [App\Http\Controllers\CompromisoController::class, 'compromiso_list'])->name('compromisos');
    Route::post('/admin/comercial/new_compromiso', [App\Http\Controllers\CompromisoController::class, 'newCompromiso'])->name('new_compromiso');

    Route::get('/admin/comercial/requerimientos', [App\Http\Controllers\HomeController::class, 'requerimiento'])->name('requerimiento');

    //Técnico
    Route::get('/admin/tecnico/slip_cotizacion', [App\Http\Controllers\HomeController::class, 'slip'])->name('slipnot'); //cambio david
    // Route::get('/admin/tecnico/gestion_seguro', [App\Http\Controllers\HomeController::class, 'gestion'])->name('gestion');
    //técnico - producción facultativa
    Route::get('/admin/tecnico/produccion_facultativa/emision', [App\Http\Controllers\HomeController::class, 'facultativoEmision'])->name('tecnico.produccion_facultativo.emision');

    //Route::patch('/slip/{id}', [App\Http\Controllers\SlipController::class, 'edit'])->name('slip.edit');

    //técnico - cobrokerajes
    Route::get('/admin/tecnico/cobrokerajes/nuevo_cobrokeraje', [App\Http\Controllers\HomeController::class, 'cobrokerajeForm'])->name('tecnico.cobrokerajes.nuevo'); //Ricardo
    Route::post('/storecobrokeraje', [SlipController::class, 'storecobrokeraje'])->name('storecobrokeraje');
    Route::get('/admin/tecnico/cobrokerajes/borderoux', [App\Http\Controllers\HomeController::class, 'cobrokerajesBorderoux'])->name('tecnico.cobrokerajes.borderoux');
    Route::get('/admin/tecnico/cobrokerajes/reporteria', [App\Http\Controllers\HomeController::class, 'cobrokerajesReporteria'])->name('tecnico.cobrokerajes.reporteria');

    //Slip select
    Route::get('/slip_selected/{id}', [SlipController::class, 'slipSelected'])->name('slip.selected');
    Route::post('/slip_destroy/{id}', [SlipController::class, 'destroy'])->name('slip.destroy');
    //david
    Route::resource('/sercorp', SercorpController::class);
    Route::resource('/slip', SlipController::class);
    Route::resource('/management', ManagementController::class);
    Route::resource('/adjuster', AdjusterSinisterController::class);
    Route::resource('/reinsurer', ReinsurerController::class);
    Route::resource('/insurance', InsuranceController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/borderoux', BorderouxController::class);
    Route::resource('/invoicePayment', InvoicePaymentController::class);
    //Route::resource('/cobrekerajes', Cobrekerajes::class);
    Route::resource('/borderoux-installation', BorderouxInstallationController::class);

    //Route::get('/selectshow', [InsuranceController::class, 'selectshow']);
    //Route::post('/selectstore', [InsuranceController::class, 'selectstore']);
    Route::get('/admin/graphic/collection', [App\Http\Controllers\HomeController::class, 'mapcollection'])->name('mapcollection');
    //Route::get('/ajustertest', [AdjusterSinisterController::class, 'datatable'])->name('test');
    /* Route::resource('/position',PositionController::class);
    Route::resource('/contact',ContactController::class);
    Route::resource('/branch',BranchController::class);
    Route::resource('/country',CountryController::class);
    Route::resource('/country',CountryController::class);*/
    Route::get('/pdfslip/{id}', [SlipController::class, 'pdfslip'])->name('pdfroute');
    Route::post('/storecomercial', [SlipController::class, 'storecomercial'])->name('storecomercial');

    //enddavid

    // Siniestros
    Route::get('/admin/siniestros/apertura', [App\Http\Controllers\HomeController::class, 'apertura'])->name('apertura');
    Route::get('/admin/siniestros/liquidacion', [App\Http\Controllers\HomeController::class, 'liquidacion'])->name('liquidacion');
    Route::get('/admin/siniestros/pago', [App\Http\Controllers\HomeController::class, 'pago'])->name('pago');
    Route::get('/admin/siniestros/bordero', [App\Http\Controllers\HomeController::class, 'bordero'])->name('bordero');
    Route::get('/admin/siniestros/estados_de_cuenta', [App\Http\Controllers\HomeController::class, 'estados'])->name('estados.cuenta');

    // Cartera y cobranzas
    Route::get('/admin/cartera_y_cobranzas/produccion', [App\Http\Controllers\HomeController::class, 'carteraProduccion'])->name('carteraProduccion');
    Route::get('/admin/cartera_y_cobranzas/siniestros', [App\Http\Controllers\HomeController::class, 'carteraSiniestros'])->name('carteraSiniestros');
    Route::get('/admin/cartera_y_cobranzas/borderaux/cartera_management', [App\Http\Controllers\borderauxCobranzasController::class, 'index'])->name('borderaux.cartera_management');
    Route::get('/admin/cartera_y_cobranzas/borderaux/listado', [App\Http\Controllers\borderauxCobranzasController::class, 'index'])->name('borderaux.listado');
    Route::get('/admin/cartera_y_cobranzas/borderaux/item/{borIntallationId}', [App\Http\Controllers\borderauxCobranzasController::class, 'management'])->name('borderaux.manejo');

    Route::put('/invoicePaymentApi/update/{id}',  [InvoicePaymentController::class, 'update']);

    // Contratos automáticos



    // ============================
    // ========= Reportes =========
    // ============================

    // Producción
    Route::get('/admin/reportes/produccion/estados', [App\Http\Controllers\HomeController::class, 'reporteProduccion'])->name('produccion.estados');
    Route::get('/admin/reportes/cobrokerajes/emision', [App\Http\Controllers\HomeController::class, 'reporteBorderaux'])->name('reportes.cobrokeraje');


    // Siniestros



    // Gráficos dinámicos



    // Cotizaciones



    // Vencimientos


    //download
    Route::get('/download/{fileId}', [HomeController::class, 'download']);

    //SESSION
    Route::post('/getType', [HomeController::class, 'typeConverageSelected'])->name('type_coverage');


    
    //Edit compromisos

    Route::get('/admin/comercial/edit_compromiso/vida/{id}', [CompromisoController::class, 'vida'])->name('edit.vida');
    Route::get('/admin/comercial/edit_compromiso/activos/{id}', [CompromisoController::class, 'activos'])->name('edit.activos');
    Route::get('/admin/comercial/edit_compromiso/energia/{id}', [CompromisoController::class, 'energia'])->name('edit.energia');
    Route::get('/admin/comercial/edit_compromiso/tecnico/{id}', [CompromisoController::class, 'tecnico'])->name('edit.tecnico');
    Route::get('/admin/comercial/edit_compromiso/responsabilidad/{id}', [CompromisoController::class, 'responsabilidad'])->name('edit.responsabilidad');
    Route::get('/admin/comercial/edit_compromiso/vehiculos/{id}', [CompromisoController::class, 'vehiculos'])->name('edit.vehiculos');
    Route::get('/admin/comercial/edit_compromiso/aviacion/{id}', [CompromisoController::class, 'aviacion'])->name('edit.aviacion');
    Route::get('/admin/comercial/edit_compromiso/maritimo/{id}', [CompromisoController::class, 'maritimo'])->name('edit.maritimo');
    Route::get('/admin/comercial/edit_compromiso/riesgos/{id}', [CompromisoController::class, 'riesgos'])->name('edit.riesgos');
    Route::get('/admin/comercial/edit_compromiso/fianzas/{id}', [CompromisoController::class, 'fianzas'])->name('edit.fianzas');
    
});





// ===========================
// ======== APIs =============
// ===========================

//En caso de usar las rutas y no las apis, comentar las apis y usar php artisan route:cache
// Route::resource('/reinsurer', ReinsurerController::class);
// Route::resource('/reinsurerType', ReinsurerTypeController::class);
// Route::resource('/excluye', ExcluyeController::class);
// Route::resource('/position', PositionController::class); //cargo de la persona
// Route::resource('/region', RegionController::class);
// Route::resource('/reinsurerBusiness', ReinsurerBusinessController::class);

Route::get('admin/compromiso/pending', [App\Http\Controllers\CompromisoController::class, 'getCompromisos'])
->name('getCompromisos');

Route::get('admin/compromiso/pending/{id}', [App\Http\Controllers\CompromisoController::class, 'getCompromisos'])
->name('edit_selectedCompromiso');

Route::get('/compromisosList', [App\Http\Controllers\CompromisoController::class, 'getCompromisosList'])
->name('compromisosJSON');