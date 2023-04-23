<?php

use App\Http\Controllers\Api\AditionalCoverageApiController;
use App\Http\Controllers\Api\AdjusterRecords;
use App\Http\Controllers\Api\AdjusterSinisterApiController;
use App\Http\Controllers\Api\AgenteRecords;
use App\Http\Controllers\Api\AwardeeApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\BankRecords;
use App\Http\Controllers\Api\BoatDetailSlipApiController;
use App\Http\Controllers\Api\BorderauxRecords;
use App\Http\Controllers\Api\BorderouxesControllerApi;
use App\Http\Controllers\Api\BorderouxesInstallationApiController;
use App\Http\Controllers\Api\BranchApiController;
use App\Http\Controllers\Api\BussinesApiController;
use App\Http\Controllers\Api\CalculationModalApiController;
use App\Http\Controllers\Api\CalculoModalController;
use App\Http\Controllers\Api\ClauseSlipApiController;
use App\Http\Controllers\Api\ClientRecords;
use App\Http\Controllers\Api\CobrokerajeRecords;
use App\Http\Controllers\Api\CompromisoController;
use App\Http\Controllers\Api\ConditionSlipApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\ContactRecords;
use App\Http\Controllers\Api\CountriesApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryApiController;
use App\Http\Controllers\Api\CoverageApiController;
use App\Http\Controllers\Api\CoveragesApi;
use App\Http\Controllers\Api\DeductibleSlipApiController;
use App\Http\Controllers\Api\DetailMachineRtApiController;
use App\Http\Controllers\Api\EntityApiController;
use App\Http\Controllers\Api\ExclusionSlipApiController;
use App\Http\Controllers\Api\GuaranteePaymentApiController;
use App\Http\Controllers\Api\GuarantePaymentClientApiController;
use App\Http\Controllers\Api\InformationAerialHelmetsApiController;
use App\Http\Controllers\Api\InformationReinsuranceApiController;
use App\Http\Controllers\Api\InsuranceApiController;
use App\Http\Controllers\Api\LimitInsuredApiController;
use App\Http\Controllers\Api\NamesForConfirmedApiController;
use App\Http\Controllers\Api\ObjectInsuranceApiController;
use App\Http\Controllers\Api\PonderacionCostApiController;
use App\Http\Controllers\Api\PositionApiController;
use App\Http\Controllers\Api\RegionApiController;
use App\Http\Controllers\Api\ReinsurerApiController;
use App\Http\Controllers\Api\ReinsurerExcluyeApiController;
use App\Http\Controllers\Api\SecurityApiController;
use App\Http\Controllers\Api\SercorpApiController;
use App\Http\Controllers\Api\SumAssuredApiController;
use App\Http\Controllers\Api\SumRcAssuredApiController;
use App\Http\Controllers\Api\TypeCoverageApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\VehicleDetailApiController;
use App\Http\Controllers\Api\ReinsuranceManagementApiController;
use App\Http\Controllers\Api\CoveragesControllerApi;
use App\Http\Controllers\Api\InstallationRecords;
use App\Http\Controllers\Api\InvoicePaymentApiController;
use App\Http\Controllers\Api\LloydRecords;
use App\Http\Controllers\Api\PositionRecords;
use App\Http\Controllers\Api\ReinsurerList;
use App\Http\Controllers\Api\ReinsurerRecords;
use App\Http\Controllers\Api\SlipsApi;
use App\Http\Controllers\Api\StatusesApi;
use App\Http\Controllers\Api\UsersApi;
use App\Http\Controllers\InvoicePaymentController;
use App\Http\Controllers\ClausulasSelectorController;
use App\Http\Controllers\CoberturasSelectorController;
use App\Http\Controllers\SlipApiController;
use Database\Seeders\ExclusionesSelectorSeeder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/apicountry', CountryApiController::class);
Route::resource('/apiposition', PositionApiController::class);
Route::resource('/apicontact', ContactApiController::class);
Route::resource('/apiexcluye', ReinsurerExcluyeApiController::class);
Route::resource('/apitypecoverage', TypeCoverageApiController::class);
Route::resource('/apibranch', BranchApiController::class);
Route::resource('/apiinsurence', InsuranceApiController::class); //seguro
Route::resource('/apiadjuster', AdjusterSinisterApiController::class);
Route::resource('/apibussines', BussinesApiController::class);
Route::resource('/apireinsurer', ReinsurerApiController::class); //broker de resagurador
Route::resource('/apiregion', RegionApiController::class);
Route::resource('/apientity', EntityApiController::class);
Route::resource('/apiawardee', AwardeeApiController::class);
Route::resource('/apiuser', UserApiController::class);
Route::resource('/apisercorp', SercorpApiController::class);
Route::resource('/apiaditionalcoverage', AditionalCoverageApiController::class);
Route::resource('/apicoverageslip', CoverageApiController::class);
Route::resource('/apiobjectinsurance', ObjectInsuranceApiController::class);
Route::resource('/apideductibleslip', DeductibleSlipApiController::class);
Route::resource('/apiclauseslip', ClauseSlipApiController::class);
Route::resource('/apisumassured', SumAssuredApiController::class);
Route::resource('/apisecurity', SecurityApiController::class);
Route::resource('/apiguaranteepayment', GuaranteePaymentApiController::class);
Route::resource('/apiguaranteepaymentclient', GuarantePaymentClientApiController::class);
Route::resource('/apiexclusionslip', ExclusionSlipApiController::class);
Route::resource('/apilimitinsured', LimitInsuredApiController::class);
Route::resource('/apiboatdetail', BoatDetailSlipApiController::class);
Route::resource('/apiinformationaerial', InformationAerialHelmetsApiController::class);
Route::resource('/apiconditionslip', ConditionSlipApiController::class);
Route::resource('/apisumrcassured', SumRcAssuredApiController::class);
Route::resource('/apidetailmachinert', DetailMachineRtApiController::class);
Route::resource('/apivehicledetail', VehicleDetailApiController::class);
Route::resource('/calculomodal', CalculoModalController::class);
Route::resource('/apicalculomodal', CalculationModalApiController::class);
Route::resource('/apiinformationreinsurance', InformationReinsuranceApiController::class);
Route::resource('/apiponderacioncost', PonderacionCostApiController::class);
Route::resource('/apinamesforconfirmed', NamesForConfirmedApiController::class);
Route::resource('/apireimanager', ReinsuranceManagementApiController::class);
Route::resource('/borderouxesInstallationApi', BorderouxesInstallationApiController::class);
Route::resource('/borderouxesApi', BorderouxesControllerApi::class);
Route::resource('/bankApi', BankApiController::class); // Bancos
Route::resource('/clausuleInvetoryApi', CoveragesControllerApi::class); //Inventario de cláusulas
//Route::resource('/invoicePaymentApi', InvoicePaymentController::class); //Pagos de facturas
Route::resource('/invoicePaymentApi', InvoicePaymentApiController::class); //Pagos de facturas por api

Route::put('/invoicePaymentApi/update/{id}',  [InvoicePaymentController::class, 'update']);

// Route::resource('/reinsurer', ReinsurerApiController::class);
// Route::resource('/reinsurerType', ReinsurerTypeApiController::class);
// Route::resource('/excluye', ExcluyeApiController::class);
// Route::resource('/position', PositionApiController::class); //cargo de la persona
// Route::resource('/region', RegionApiController::class);
// Route::resource('/reinsurerBusiness', ReinsurerBusinessApiController::class);


//Users
Route::resource('/apiusers', UserApiController::class);

//Comercial - Compromisos
Route::get('comercial/compromisos', [CompromisoController::class, "compromiso"]);
Route::get('comercial/compromisos', [CompromisoController::class, "compromisoData"])->name('compromisoData');

//broker and resource
Route::get('/getReinsurerBroker', [ReinsurerApiController::class, "getReinsurerBroker"]);

//show api installation borderoux
Route::get('/showInstallationBorderoux/{borderouxid}', [BorderouxesInstallationApiController::class, 'showInstallationBorderoux']);
//Route::get('/showInstallationBorderoux/{borderouxid}', [BorderouxesInstallationApiController::class, 'showInstallationBorderoux']);

Route::post('/filterInstall', [BorderouxesControllerApi::class, "borderouxFilterInstall"]);



//Ricardo

//Records

Route::resource('/branches', BranchApiController::class);

Route::resource('/statuses', StatusesApi::class);
Route::apiResource('/users', UsersApi::class);
Route::resource('/countries', CountriesApi::class);
Route::resource('/slips', SlipsApi::class);
Route::get('/slips/{id}/files', [SlipsApi::class, 'slipFiles']);
Route::get('/slips/{id}/pdf', [SlipsApi::class, 'slipPDF']);

Route::resource('/adjusters', AdjusterRecords::class);
Route::resource('/reinsurers', ReinsurerRecords::class);
Route::resource('/lloyds', LloydRecords::class);
Route::resource('/agentes', AgenteRecords::class);
Route::resource('/coverages', CoveragesApi::class);
Route::resource('/contact', ContactRecords::class);
Route::resource('/clients', ClientRecords::class);
Route::resource('/reinsurer_list', ReinsurerList::class);
Route::resource('/positions', PositionRecords::class);
Route::resource('/cobrokerajes', CobrokerajeRecords::class);
Route::resource('/banks', BankRecords::class);
Route::resource('/borderaux', BorderauxRecords::class);
Route::resource('/installation', InstallationRecords::class);

Route::apiResource('/clausulas_selectors', ClausulasSelectorController::class);
Route::apiResource('/coberturas_selectors', CoberturasSelectorController::class);
Route::apiResource('/exclusiones_selectors', ExclusionesSelectorSeeder::class);

Route::apiResource('/storeSlip', SlipApiController::class);
//End Ricardo
