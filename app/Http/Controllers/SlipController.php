<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCoverage;
use App\Models\AviacionExtras;
use App\Models\BoatDetailSlip;
use App\Models\ClauseSlip;
use App\Models\Clausulas_selector;
use App\Models\CoberturasSelector;
use App\Models\CompensationLimit;
use App\Models\Country;
use App\Models\CoverageLimit;
use App\Models\CoverageSlip;
use App\Models\DeductibleSlip;
use App\Models\DetailPerdios;
use App\Models\EquipmentListInsured;
use App\Models\File;
use App\Models\GuaranteePayment;
use App\Models\InformationAerialHelmets;
use App\Models\ObjectInsurance;
use App\Models\Security;
use App\Models\Slip;
use App\Models\SlipAviationOne;
use App\Models\SlipAviationThree;
use App\Models\SlipAviationTwo;
use App\Models\SlipCivilLiability;
use App\Models\SlipEnergy;
use App\Models\SlipFianzaOne;
use App\Models\SlipFianzaTwo;
use App\Models\SlipFinancialRisk;
use App\Models\SlipLifePersonlAccident;
use App\Models\SlipMaritimeFour;
use App\Models\SlipMaritimeOne;
use App\Models\SlipMaritimeThree;
use App\Models\SlipMaritimeTwo;
use App\Models\SlipPropertyFixedAsset;
use App\Models\SlipStatus;
use App\Models\SlipTechnicalBranch;
use App\Models\SlipVehicle;
use App\Models\SumAssured;
use App\Models\VehicleDetail;
use App\Traits\HasUploadFiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SlipController extends Controller
{
    use HasUploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $slipsUser = Slip::where('slip_status_id', '3')->get();
        $countries = Country::all();

        $slip_statuses = SlipStatus::all();

        return view('admin.tecnico.slip.index')
            ->with('slipsUser', $slipsUser)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('user', $user);
    }

    public function slipSelected($id)
    {
        $slip = Slip::find($id);

        //variables nulls para no tirar error
        $object_insurance = [];

        switch ($slip->type_coverage) {
            case '1':
            case '2':
            case '3':
            case '4':
                $slip_type = SlipLifePersonlAccident::where('slip_id', $id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'vida')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'vida')->get();
                break;
            case '5':
            case '6':
            case '7':
            case '8':
                $slip_type = SlipPropertyFixedAsset::where('id', $slip->model_id)
                    ->with('sum_assured')
                    ->with('detail_perdios')
                    ->with('equipment_list')
                    ->first();
                break;

            case '9':
            case '10':
                $slip_type = SlipVehicle::where('id', $slip->model_id)
                    ->with('vehicle_detail')->first();

                break;
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                $slip_type = SlipTechnicalBranch::where('id', $slip->model_id)
                    ->with('sum_rc_assured')
                    ->with('detail_machin')
                    ->with('compensation_limit')
                    ->with('sum_assured')
                    ->first();
                break;
            case '18':
            case '19':
            case '20':
                $slip_type = SlipEnergy::where('id', $slip->model_id)
                    ->with('sum_assured')
                    ->first();
                break;

            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('id', $slip->model_id)
                    ->with('boat_detail')
                    ->first();

                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('id', $slip->model_id)
                    ->with('boat_detail')
                    ->first();

                break;

            case '24':
            case '25':
            case '26':
                $slip_type = SlipMaritimeThree::where('id', $slip->model_id)
                    ->with('object_insurance')
                    ->first();
                break;

            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                $slip_type = SlipMaritimeFour::where('id', $slip->model_id)
                    //->with('storage_stock')
                    //->with('transport_stock')
                    ->first();
                break;

            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('id', $slip->model_id)
                    ->with('information_aerial')
                    ->with('coverage')
                    ->first();

                break;

            case '34':
                $slip_type = SlipAviationTwo::where('id', $slip->model_id)
                    ->with('object_insurance')
                    ->first();

                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('id', $slip->model_id)
                    ->with('object_insurance')
                    ->first();
                break;

            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':

                $slip_type = SlipCivilLiability::where('id', $slip->model_id)
                    ->with('compensation_limit')
                    ->first();

                /* dd($slip_type->compensation_limit[0]->limit_event); */
                break;

            case '44':
            case '45':
                $slip_type = SlipFinancialRisk::where('id', $slip->model_id)
                    ->with('compensation_limit')
                    ->with('condition')
                    ->first();
                break;

            case '46':
                $slip_type = SlipFianzaOne::where('id', $slip->model_id)
                    ->with('object_insurance')
                    ->with('compensation_limit')
                    ->first();
                break;

            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                $slip_type = SlipFianzaTwo::where('id', $slip->model_id)
                    ->with('compensation_limit')
                    ->first();
                break;

            default:
                return 'other';
                break;
        }

        $user = Auth::user();

        return view('admin.tecnico.slip.slipSelected')
            ->with('user', $user)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('object_insurance', $object_insurance);

        //$object = $slip_life->with('slip_object')->first();

        // return view('admin.tecnico.slip.type_slip.slipConstruccion')
        /* return view('admin.tecnico.slip.slipSelected')
    ->with('user', $user)
    ->with('slips', $slips)
    ->with('slipsUser', $slipsUser)
    ->with('slipSelected', $slipSelected)
    ->with('country', $selectedCountry)
    ->with('coverage', $selectedCoverage); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $slip_all = Slip::with('type')
        ->with('country')
        ->with('security')
        ->with('guarantee_payment')
        ->with('country_politics_one')->with('model')->where('id',2)->get();
        return $slip_all; */
        $user = Auth::user();
        $slips = Slip::all();
        $slipsUser = $slips->where('user_id', $user->id);

        return view('admin.tecnico.slip.create')
            ->with('slipsUser', $slipsUser)
            ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    }

    public function global_rut($file, $folder)
    {
        //$file_type = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/uploads/' . $folder;
        //$destinationPathThumb = public_path() . '/uploads/' . $folder . 'thumb';
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $url = '/uploads/' . $folder . '/' . $filename;

        if ($file->move($destinationPath . '/', $filename)) {
            return $url;
        }
        /* $nombre = "file_" . time() . "." . $file->guessExtension();
    $ruta = public_path("file/" . $nombre);
    copy($file, $ruta);
    return $ruta; */
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slip  $slip
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Slip::with('type')->with('country')->get();
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
     * @param  \App\Models\Slip  $slip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $slips = Slip::all();
        $slipsUser = $slips->where('user_id', $user->id);

        if ($slipsUser->type_coverage == 1 || $slipsUser->type_coverage == 2) {
            $object = Slip::where('id', $id)
                ->with('country')
                ->with('security')
                ->with('guarantee_payment')
                ->with('deductible')
                ->with('coverage')
                ->with('clause_aditional')
                ->with('excluye')->with('model')
                ->first();
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $slip = Slip::find($id);
        $slip->deductible()->delete();
        $slip->clause_aditional()->delete();
        $slip->coverage_additional()->delete();
        $slip->security()->delete();
        $slip->guarantee_payment()->delete();

        $selectSlip = Slip::where('id', $id)->select('model_id', 'type_coverage')->first();

        $slip->slip_status_id = '3';
        $basePath = "slips";
        switch ($slip->type_coverage) {
                //vida y accidentes personales
            case '1':
            case '2':
            case '3':
            case '4':
                $type_slip = SlipLifePersonlAccident::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                ObjectInsurance::where('slip_id', $id)->delete();

                //Objeto del Seguro
                if ($request->has('birthday')) {
                    for ($i = 0; $i < count($request->birthday); $i++) {
                        $object_insurance = new ObjectInsurance([
                            'birthday' => $request->birthday[$i] ?? null,
                            'name' => $request->name[$i] ?? null,
                            'age' => $request->age[$i] ?? null,
                            'sex_merchant' => $request->sex_merchant[$i] ?? null,
                            'activity_merchant' => $request->activity_merchant[$i] ?? null,
                            'limit' => $request->limit[$i] ?? null,
                            'slip_id' => $slip->id
                        ]);
                        $object_insurance->save();
                    }
                }

                $this->saveFilesFromRequest($request, $basePath, 'vida', $type_slip->id);

                break;
                //Propiedad activos fijos
            case '5':
            case '6':
            case '7':
            case '8':
                $type_slip = SlipPropertyFixedAsset::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                DetailPerdios::where('slip_id', $id)->delete();
                SumAssured::where('slip_id', $id)->delete();

                //predios
                if ($request->has('direction_perdios')) {
                    for ($i = 0; $i < count($request->direction_perdios); $i++) {
                        if (isset($request->direction_perdios[$i])) {
                            $detailPredios = new DetailPerdios([
                                'province_perdios' => $request->province_perdios[$i] ?? null,
                                'city_perdios' => $request->city_perdios[$i] ?? null,
                                'direction_perdios' => $request->direction_perdios[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $detailPredios->save();
                        }
                    }
                }

                //Suma Asegurada
                if ($request->has('location')) {
                    for ($i = 0; $i < count($request->location); $i++) {
                        if (isset($request->location[$i])) {
                            $sumAssured = new SumAssured([
                                'location' => $request->location[$i] ?? null,
                                'edification' => $request->edification[$i] ?? null,
                                'contents' => $request->contents[$i] ?? null,
                                'equipment' => $request->equipment[$i] ?? null,
                                'machine' => $request->machine[$i] ?? null,
                                'commodity' => $request->commodity[$i] ?? null,
                                'other_sum_assured' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_1' => $request->other_sum_assured_1[$i] ?? null,
                                'other_sum_assured_2' => $request->other_sum_assured_2[$i] ?? null,
                                'other_sum_assured_3' => $request->other_sum_assured_3[$i] ?? null,
                                'other_sum_assured_4' => $request->other_sum_assured_4[$i] ?? null,
                                'other_sum_assured_5' => $request->other_sum_assured_5[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $sumAssured->save();
                        }
                    }
                }
                $this->saveFilesFromRequest($request, $basePath, 'activos_fijos', $type_slip->id, 'activos-fijos');
                break;
                //Vehículos
            case '9':
            case '10':
                $type_slip = SlipVehicle::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                VehicleDetail::where('slip_id', $id)->delete();
                //tabla vehiculos
                if ($request->has('plate_vehicle')) {
                    for ($i = 0; $i < count($request->plate_vehicle); $i++) {
                        if (isset($request->plate_vehicle[$i])) {
                            $plate = new VehicleDetail([
                                'plate_vehicle' => $request->plate_vehicle[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $plate->save();
                        }
                    }
                }

                $this->saveFilesFromRequest($request, $basePath, 'vehiculos', $type_slip->id);
                break;
                //Ramos Técnicos
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                $type_slip = SlipTechnicalBranch::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                $this->saveFilesFromRequest($request, $basePath, 'tecnico',  $type_slip->id);
                break;
                //energia
            case '18':
            case '19':
            case '20':
                $type_slip = SlipEnergy::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                SumAssured::where('slip_id', $id)->delete();

                if ($request->has('location')) {
                    for ($i = 0; $i < count($request->location); $i++) {
                        if (isset($request->location[$i])) {
                            $sumAssured = new SumAssured([
                                'location' => $request->location[$i] ?? null,
                                'edification' => $request->edification[$i] ?? null,
                                'contents' => $request->contents[$i] ?? null,
                                'equipment' => $request->equipment[$i] ?? null,
                                'machine' => $request->machine[$i] ?? null,
                                'commodity' => $request->commodity[$i] ?? null,
                                'other_sum_assured' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_1' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_2' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_3' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_4' => $request->other_sum_assured[$i] ?? null,
                                'other_sum_assured_5' => $request->other_sum_assured[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $sumAssured->save();
                        }
                    }
                }

                $this->saveFilesFromRequest($request, $basePath, 'energia',  $type_slip->id);
                break;
                //Maritimo
            case '21':
            case '22':
            case '23':
            case '24':
            case '25':
            case '26':
            case '27':
            case '28':
            case '29':
            case '30':
            case '31':

                switch ($slip->type_coverage) {
                    case '21':
                    case '22':
                        $type_slip = SlipMaritimeOne::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        BoatDetailSlip::where('slip_id', $id)->delete();

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_1',  $type_slip->id);
                        break;

                    case '23':
                        $type_slip = SlipMaritimeTwo::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        BoatDetailSlip::where('slip_id', $id)->delete();

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_2',  $type_slip->id);
                        break;

                    case '24':
                    case '25':
                    case '26':
                        $type_slip = SlipMaritimeThree::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_3',  $type_slip->id);
                        break;
                    case '27':
                    case '28':
                    case '29':
                    case '30':
                    case '31':
                        $type_slip = SlipMaritimeFour::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_4',  $type_slip->id);
                        break;
                }

                //tabla detalle barcos:
                if ($request->has('name_boat')) {
                    for ($i = 0; $i < count($request->name_boat); $i++) {
                        if (isset($request->name_boat[$i])) {
                            $boats = new BoatDetailSlip([
                                'name_boat' => $request->name_boat[$i] ?? null,
                                'registration_boat' => $request->registration_boat[$i] ?? null,
                                'material_boat' => $request->material_boat[$i] ?? null,
                                'manga_boat' => $request->manga_boat[$i] ?? null,
                                'eslora_boat' => $request->eslora_boat[$i] ?? null,
                                'puntual_boat' => $request->puntual_boat[$i] ?? null,
                                'shell_boat' => $request->shell_boat[$i] ?? null,
                                'machine_boat' => $request->machine_boat[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $boats->save();
                        }
                    }
                }

                break;

                //aviacion
            case '32':
            case '33':
            case '34':
            case '35':
            case '36':
            case '37':
                switch ($selectSlip->type_coverage) {
                    case '32':
                    case '33':
                        $type_slip = SlipAviationOne::where('slip_id', $id)->first();
                        $type_slip->update($request->all());


                        InformationAerialHelmets::where('slip_id', $id)->delete();
                        AviacionExtras::where('slip_id', $id)->delete();

                        //coberturas y limite de coberturas
                        for ($i = 0; $i < count($request->description_coverage); $i++) {
                            if (isset($request->description_coverage[$i])) {
                                $aviacion_extras = new AviacionExtras([
                                    'description_coverage' => $request->description_coverage[$i] ?? null,
                                    'aditional_coverage' => $request->aditional_coverage[$i] ?? null,
                                    'limit_description_coverage' => $request->limit_description_coverage[$i] ?? null,
                                    'limit_aditional_coverage' => $request->limit_aditional_coverage[$i] ?? null,
                                    'slip_id' => $slip->id
                                ]);
                                $aviacion_extras->save();
                            }
                        }

                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_1',  $type_slip->id);
                        break;
                    case '34':
                        $type_slip = ObjectInsurance::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        BoatDetailSlip::where('slip_id', $id)->delete();

                        $type_slip->object_insurance()->delete();
                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_2',  $type_slip->id);
                        break;
                    case '35':
                    case '36':
                    case '37':
                        $type_slip = SlipAviationThree::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_3',  $type_slip->id);
                        break;
                    default:
                        # code...
                        break;
                }

                // Datos de la aeronave
                if ($request->has('type_ala_aerial')) {
                    for ($i = 0; $i < count($request->type_ala_aerial); $i++) {
                        if (isset($request->type_ala_aerial[$i])) {
                            $informationAerialHelmet = new InformationAerialHelmets([
                                'type_ala_aerial' => $request->type_ala_aerial[$i] ?? null,
                                'serie_aerial' => $request->serie_aerial[$i] ?? null,
                                'marca_aerial' => $request->marca_aerial[$i] ?? null,
                                'model_aerial' => $request->model_aerial[$i] ?? null,
                                'year_manufacture_aerial' => $request->year_manufacture_aerial[$i] ?? null,
                                'cap_crew' => $request->cap_crew[$i] ?? null,
                                'cap_pax' => $request->cap_pax[$i] ?? null,
                                'sum_insured' => $request->sum_insured[$i] ?? null,
                                'slip_aviation_one_id' => $type_slip->id,
                                'slip_id' => $slip->id
                            ]);
                            $informationAerialHelmet->save();
                        }
                    }
                }

                //Objeto del seguro
                if ($request->has('age')) {
                    for ($i = 0; $i < count($request->birthday); $i++) {
                        if (isset($request->birthday[$i])) {
                            $object_insurance = new ObjectInsurance([
                                'limit' => $request->limit[$i] ?? null,
                                'age' => $request->age[$i] ?? null,
                                'birthday' => $request->birthday[$i] ?? null,
                                'name' => $request->name[$i] ?? null,
                                'slip_id' => $slip->id
                            ]);
                            $object_insurance->save();
                        }
                    }
                }

                break;
                //Responsabilidad Civil
            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':
                $type_slip = SlipCivilLiability::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                $this->saveFilesFromRequest($request, $basePath, 'responsabilidad',  $type_slip->id);
                break;

                //Riesgos Financieros
            case '44':
            case '45':
                $type_slip = SlipFinancialRisk::where('slip_id', $id)->first();
                $type_slip->update($request->all());

                $this->saveFilesFromRequest($request, $basePath, 'riesgo',  $type_slip->id);
                break;
                //fianza
            case '46':
            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':

                switch ($selectSlip->type_coverage) {
                    case '46':
                        $type_slip = SlipFianzaOne::where('slip_id', $id)->first();
                        $type_slip->update($request->all());

                        ObjectInsurance::where('slip_id', $id)->delete();

                        //objeto asegurado
                        if ($request->has('activity_merchant')) {
                            for ($i = 0; $i < count($request->activity_merchant); $i++) {
                                if (isset($request->activity_merchant[$i])) {
                                    $object_insurance = new ObjectInsurance([
                                        'number' => $request->number[$i] ?? null,
                                        'name' => $request->name[$i] ?? null,
                                        'activity_merchant' => $request->activity_merchant[$i] ?? null,
                                        'limit' => $request->limit[$i] ?? null,
                                        'slip_id' => $slip->id
                                    ]);
                                    $object_insurance->save();
                                }
                            }
                        }
                        $this->saveFilesFromRequest($request, $basePath, 'fianza_1',  $type_slip->id);
                        break;

                    case '47':
                    case '48':
                    case '49':
                    case '50':
                    case '51':
                    case '52':
                        $type_slip = SlipFianzaTwo::where('slip_id', $id)->first();
                        $type_slip->update($request->all());
                        $this->saveFilesFromRequest($request, $basePath, 'fianza_2',  $type_slip->id);
                        break;
                }

                break;
            default:
                return 'slip no encotrado';
                break;
        }
        //coberturas adicionales
        if ($request->has('description_coverage_additional')) {
            for ($i = 0; $i < count($request->description_coverage_additional); $i++) {
                if (isset($request->description_coverage_additional[$i])) {
                    $additional_coverages = new AdditionalCoverage([
                        'description_coverage_additional' => $request->description_coverage_additional[$i] ?? null,
                        'coverage_additional_additional' => $request->coverage_additional_additional[$i] ?? null,
                        'coverage_additional_usd' => $request->coverage_additional_usd[$i] ?? null,
                        'coverage_additional_additional2' => $request->coverage_additional_additional2[$i] ?? null,
                        'slip_id' => $slip->id
                    ]);
                    $additional_coverages->save();
                }
            }
        }

        //clausulas adicionales
        if ($request->has('description_clause_additional')) {
            for ($i = 0; $i < count($request->description_clause_additional); $i++) {
                if (isset($request->description_clause_additional[$i])) {
                    $additional_clauses = new ClauseSlip([
                        'description_clause_additional' => $request->description_clause_additional[$i] ?? null,
                        'clause_additional_additional' => $request->clause_additional_additional[$i] ?? null,
                        'clause_additional_usd' => $request->clause_additional_usd[$i] ?? null,
                        'clause_additional_additional2' => $request->clause_additional_additional2[$i] ?? null,
                        'slip_id' => $slip->id
                    ]);
                    $additional_clauses->save();
                }
            }
        }

        //deductibles
        if ($request->has('description_deductible')) {
            for ($i = 0; $i < count($request->description_deductible); $i++) {
                if (isset($request->description_deductible[$i])) {
                    $deductibles = new DeductibleSlip([
                        'description_deductible' => $request->description_deductible[$i] ?? null,
                        'sinister_value' => $request->sinister_value[$i] ?? null,
                        'insured_value' => $request->insured_value[$i] ?? null,
                        'minimum' => $request->minimum[$i] ?? null,
                        'description2_deductible' => $request->description2_deductible[$i] ?? null,
                        'slip_id' => $slip->id
                    ]);
                    $deductibles->save();
                }
            }
        }

        //limite de cobertura
        if ($request->has('limit_aditional_coverage')) {
            for ($i = 0; $i < count($request->limit_aditional_coverage); $i++) {
                if (isset($request->limit_aditional_coverage[$i])) {
                    $coverage = new CoverageLimit([
                        'limit_description_coverage' => isset($request->limit_description_coverage[$id]) ? $request->limit_description_coverage[$id] : null,
                        'limit_aditional_coverage' => isset($request->limit_aditional_coverage[$i]) ? $request->limit_aditional_coverage[$i] : null,
                    ]);
                    $slip->limit_coverage()->save($coverage);
                }
            }
        }


        //security
        if ($request->has('name_insurer')) {
            for ($i = 0; $i < count($request->name_insurer); $i++) {
                if (isset($request->name_insurer[$i])) {
                    $security = new Security([
                        'name_insurer' => isset($request->name_insurer[$i]) ? $request->name_insurer[$i] : null,
                        'porcentage' => isset($request->porcentage[$i]) ? $request->porcentage[$i] : null,
                    ]);

                    $slip->security()->save($security);
                }
            }
        }

        //Pago de garantia
        if ($request->has('installation')) {
            for ($i = 0; $i < count($request->installation); $i++) {
                if (isset($request->installation[$i])) {
                    $gp = new GuaranteePayment([
                        'num_day' => isset($request->num_day[$i]) ? $request->num_day[$i] : null,
                        'installation' => isset($request->installation[$i]) ? $request->installation[$i] : null,
                        'date_payment' => isset($request->date_payment[$i]) ? $request->date_payment[$i] : null,
                        'description' => isset($request->description[$i]) ? $request->description[$i] : null,
                        'valor' => isset($request->valor[$i]) ? $request->valor[$i] : null,
                    ]);

                    $slip->guarantee_payment()->save($gp);
                }
            }
        }

        //archivos
        if ($request->has("file")) {
            //$files = $request->file("file");
            $files = $request->file;

            foreach ($files as $key) {
                $newFile = new File([
                    'url_file' => $this->global_rut($key, 'file'),
                ]);

                $slip->file()->save($newFile);
            }
        }

        //update & save
        $slip->update($request->all());
        $slip->save();

        $user = Auth::user();
        if ($user->role === "comercial") {
            return redirect('/admin/compromiso/pending')
                ->with('success', 'El Slip ha sido modificado y enviado al departamento técnico de manera exitosa.');
        } else {
            return redirect('/admin/compromiso/pending')
                ->with('success', 'El Slip ha sido modificado y enviado al departamento técnico de manera exitosa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slip  $slip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slip::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }

    public function storecomercial(Request $request)
    {

        try {
            $slip = Slip::create($request->all());

            //(comentario para buscar donde se actualiza el estado del slip)
            //slip_status_id, slip_status, comercial
            //Actualiza el status del slip a 3, departamento tecnico. 2 es para compromiso
            //No sirve por input hidden, hay que hacerlo como la siguiente linea.

            $slip->slip_status_id = '2';

            switch ($request->type_slip) {
                case 'vida_forms':

                    $idslip = SlipLifePersonlAccident::create($request->all());
                    $type_slip = SlipLifePersonlAccident::find($idslip->id);
                    $slip->slip_type_id = "1";

                    if ($request->has('aditional_coverage')) {
                        //coberturas adicionales
                        for ($i = 0; $i < count($request->aditional_coverage); $i++) {
                            if (isset($request->aditional_coverage[$i])) {
                                $coverage = new CoverageSlip([
                                    'aditional_coverage' => $request->aditional_coverage[$i],
                                ]);
                                $slip->coverage()->save($coverage);
                            }
                        }
                    }

                    if ($request->has('age')) {
                        //objeto del seguro
                        for ($i = 0; $i < count($request->age); $i++) {
                            $object = new ObjectInsurance([
                                'age' => $request->age[$i],
                                'birthday' => $request->birthday[$i],
                                'sex_merchant' => $request->sex_merchant[$i],
                                'activity_merchant' => $request->activity_merchant[$i],
                            ]);
                            $type_slip->object_insurance()->save($object);
                        }
                    }

                    $type_slip->slip()->save($slip);

                    break;

                case 'activos_fijos':
                    $idslip = SlipPropertyFixedAsset::create($request->all());
                    $type_slip = SlipPropertyFixedAsset::find($idslip->id);
                    $slip->slip_type_id = "2";

                    //Suma asegurada
                    if ($request->has('location')) {
                        for ($i = 0; $i < count($request->location); $i++) {
                            if (isset($request->location[$i])) {
                                $object = new SumAssured([
                                    //'equipment_name' => isset($request->equipment_name[$i]) ? $request->equipment_name[$i] : null,
                                    'location' => isset($request->location[$i]) ? $request->location[$i] : null,
                                    'edification' => isset($request->edification[$i]) ? $request->edification[$i] : null,
                                    'contents' => isset($request->contents[$i]) ? $request->contents[$i] : null,
                                    'equipment' => isset($request->equipment[$i]) ? $request->equipment[$i] : null,
                                    'machine' => isset($request->machine[$i]) ? $request->machine[$i] : null,
                                    'commodity' => isset($request->commodity[$i]) ? $request->commodity[$i] : null,
                                    'other_sum_assured' => isset($request->other_sum_assured[$i]) ? $request->other_sum_assured[$i] : null,
                                ]);
                                $type_slip->sum_assured()->save($object);
                            }
                        }
                    }
                    //Lista de equipos a aser asegurados
                    // if ($request->has('province_perdios') | $request->has('name_equipment')) {
                    //     //predios
                    //     for ($i = 0; $i < count($request->province_perdios); $i++) {
                    //         if (isset($request->province_perdios[$i])) {
                    //             $detail = new DetailPerdios([
                    //                 'province_perdios' => $request->province_perdios[$i],
                    //                 'city_perdios' => $request->city_perdios[$i],
                    //                 'direction_perdios' => $request->direction_perdios[$i]
                    //             ]);
                    //             $type_slip->detail_perdios()->save($detail);
                    //         }
                    //     }

                    //     //Listado de equipos a ser asegurados
                    //     for ($i = 0; $i < count($request->name_equipment); $i++) {
                    //         if (isset($request->name_equipment[$i])) {
                    //             $detail = new EquipmentListInsured([
                    //                 'name_equipment' => $request->name_equipment[$i]
                    //             ]);
                    //             $type_slip->detail_perdios()->save($detail);
                    //         }
                    //     }
                    // }

                    $type_slip->slip()->save($slip);
                    $slip->save($request->all());

                    break;

                case 'vehiculo':

                    $idslip = SlipVehicle::create($request->all());
                    $type_slip = SlipVehicle::find($idslip->id);

                    $slip->slip_type_id = "3";

                    if ($request->has('plate_vehicle')) {
                        for ($i = 0; $i < count($request->plate_vehicle); $i++) {
                            if (isset($request->plate_vehicle[$i])) {
                                $vehicle = new VehicleDetail([
                                    'plate_vehicle' => $request->plate_vehicle[$i],
                                ]);

                                $type_slip->vehicle_detail()->save($vehicle);
                            }
                        }
                    }

                    $type_slip->slip()->save($slip);

                    break;

                case 'ramos_tecnicos_form':

                    $idslip = SlipTechnicalBranch::create($request->all());
                    $type_slip = SlipTechnicalBranch::find($idslip->id);
                    $slip->slip_type_id = "4";
                    $type_slip->slip()->save($slip);

                    break;
                case 'energia':

                    $idslip = SlipEnergy::create($request->all());
                    $type_slip = SlipEnergy::find($idslip->id);
                    $slip->slip_type_id = "5";
                    //$type_slip->slip()->save($slip);

                    for ($i = 0; $i < count($request->location); $i++) {
                        if (isset($request->location[$i])) {
                            $object = new SumAssured([
                                'location' => $request->location[$i],
                                'edification' => $request->edification[$i],
                                'contents' => $request->contents[$i],
                                'equipment' => $request->equipment[$i],
                                'machine' => $request->machine[$i],
                                'commodity' => $request->commodity[$i],
                                'other_sum_assured' => $request->other_sum_assured[$i],
                            ]);
                            $type_slip->sum_assured()->save($object);
                        }
                    }

                    $type_slip->slip()->save($slip);

                    break;

                case 'maritimo_1_form':
                case 'maritimo_2_form':
                case 'maritimo_3_form':
                case 'maritimo_4_form':

                    switch ($request->type_slip) {
                        case 'maritimo_1_form':
                            $idslip = SlipMaritimeOne::create($request->all());
                            $type_slip = SlipMaritimeOne::find($idslip->id);
                            break;
                        case 'maritimo_2_form':
                            $idslip = SlipMaritimeTwo::create($request->all());
                            $type_slip = SlipMaritimeTwo::find($idslip->id);
                            break;
                        case 'maritimo_3_form':
                            $idslip = SlipMaritimeThree::create($request->all());
                            $type_slip = SlipMaritimeThree::find($idslip->id);
                            break;
                        case 'maritimo_4_form':
                            $idslip = SlipMaritimeFour::create($request->all());
                            $type_slip = SlipMaritimeFour::find($idslip->id);
                            break;
                        default:
                            break;
                    }

                    if ($request->has('name_boat')) {
                        for ($i = 0; $i < count($request->name_boat); $i++) {
                            if (isset($request->name_boat[$i])) {
                                $boat = new BoatDetailSlip([
                                    'name_boat' => $request->name_boat[$i],
                                    'registration_boat' => $request->registration_boat[$i],
                                    'material_boat' => $request->material_boat[$i],
                                    'manga_boat' => $request->manga_boat[$i],
                                    'eslora_boat' => $request->eslora_boat[$i],
                                    'puntual_boat' => $request->puntual_boat[$i],
                                    'shell_boat' => $request->shell_boat[$i],
                                    'machine_boat' => $request->machine_boat[$i],
                                ]);

                                $type_slip->boat_detail()->save($boat);
                            }
                        }
                    }
                    $slip->slip_type_id = "6";

                    $type_slip->slip()->save($slip);
                    break;

                case 'aviacion_1_form':

                    $idslip = SlipAviationOne::create($request->all());
                    $type_slip = SlipAviationOne::find($idslip->id);

                    //Datos de la aeronave
                    if ($request->has('type_ala_aerial')) {
                        for ($i = 0; $i < count($request->type_ala_aerial); $i++) {
                            if (isset($request->type_ala_aerial[$i])) {
                                $object = new InformationAerialHelmets([
                                    'type_ala_aerial' => isset($request->type_ala_aerial[$i]) ? $request->type_ala_aerial[$i] : null,
                                    'serie_aerial' => isset($request->serie_aerial[$i]) ? $request->serie_aerial[$i] : null,
                                    'marca_aerial' => isset($request->marca_aerial[$i]) ? $request->marca_aerial[$i] : null,
                                    'model_aerial' => isset($request->model_aerial[$i]) ? $request->model_aerial[$i] : null,
                                    'year_manufacture_aerial' => isset($request->year_manufacture_aerial[$i]) ? $request->year_manufacture_aerial[$i] : null,
                                    'cap_crew' => isset($request->cap_crew[$i]) ? $request->cap_crew[$i] : null,
                                    'cap_pax' => isset($request->cap_pax[$i]) ? $request->cap_pax[$i] : null,
                                    'sum_insured' => isset($request->sum_insured[$i]) ? $request->sum_insured[$i] : null,
                                ]);
                                $type_slip->information_aerial()->save($object);
                            }
                        }
                    }
                    $slip->slip_type_id = "7";
                    $type_slip->slip()->save($slip);

                    break;

                case 'aviacion_2_form':
                    $idslip = SlipAviationTwo::create($request->all());
                    $type_slip = SlipAviationTwo::find($idslip->id);

                    //objeto del seguro

                    if ($request->has('number')) {
                        for ($i = 0; $i < count($request->number); $i++) {
                            if (isset($request->number[$i])) {
                                $object = new ObjectInsurance([
                                    'number' => isset($request->number[$i]) ? $request->number[$i] : null,
                                    'name' => isset($request->name[$i]) ? $request->name[$i] : null,
                                    'birthday' => isset($request->birthday[$i]) ? $request->birthday[$i] : null,
                                    'age' => isset($request->age[$i]) ? $request->age[$i] : null,
                                    'limit' => isset($request->limit[$i]) ? $request->limit[$i] : null,
                                ]);

                                $type_slip->object_insurance()->save($object);
                            }
                        }
                    }
                    $slip->slip_type_id = "7";
                    $type_slip->slip()->save($slip);
                    break;

                case 'aviacion_3_form':

                    $idslip = SlipAviationThree::create($request->all());
                    $type_slip = SlipAviationThree::find($idslip->id);

                    //Objeto del seguro
                    if ($request->has('number')) {
                        for ($i = 0; $i < count($request->number); $i++) {
                            if (isset($request->number[$i])) {
                                $object = new ObjectInsurance([
                                    'number' => isset($request->number[$i]) ? $request->number[$i] : null,
                                    'name' => isset($request->name[$i]) ? $request->name[$i] : null,
                                    'birthday' => isset($request->birthday[$i]) ? $request->birthday[$i] : null,
                                    'age' => isset($request->age[$i]) ? $request->age[$i] : null,
                                    'limit' => isset($request->limit[$i]) ? $request->limit[$i] : null,
                                ]);

                                $type_slip->object_insurance()->save($object);
                            }
                        }
                    }
                    $slip->slip_type_id = "7";

                    $type_slip->slip()->save($slip);

                    break;

                case 'finanzas_1_form':
                case 'finanzas_2_form':

                    switch ($request->type_slip) {
                        case 'finanzas_1_form':
                            $idslip = SlipFianzaOne::create($request->all());
                            $type_slip = SlipFianzaOne::find($idslip->id);
                            break;
                        case 'finanzas_2_form':
                            $idslip = SlipFianzaTwo::create($request->all());
                            $type_slip = SlipFianzaTwo::find($idslip->id);
                            break;
                    }

                    if ($request->has('description_compensation_limit')) {
                        for ($i = 0; $i < count($request->description_compensation_limit); $i++) {
                            if (isset($request->description_compensation_limit[$i])) {
                                $compensation = new CompensationLimit([
                                    'description_compensation_limit' => $request->description_compensation_limit[$i],
                                ]);
                                $type_slip->compensation_limit()->save($compensation);
                            }
                        }
                    }

                    //Objeto del seguro
                    if ($request->has('number')) {
                        for ($i = 0; $i < count($request->number); $i++) {
                            if (isset($request->number[$i])) {
                                $object = new ObjectInsurance([
                                    'number' => isset($request->number[$i]) ? $request->number[$i] : null,
                                    'name' => isset($request->name[$i]) ? $request->name[$i] : null,
                                    'activity_merchant' => isset($request->activity_merchant[$i]) ? $request->activity_merchant[$i] : null,
                                    'limit' => isset($request->limit[$i]) ? $request->limit[$i] : null,
                                ]);
                                $type_slip->object_insurance()->save($object);
                            }
                        }
                    }
                    $slip->slip_type_id = "8";

                    $type_slip->slip()->save($slip);

                    break;
                case 'responsabilidad_form':
                    $idslip = SlipCivilLiability::create($request->all());
                    $type_slip = SlipCivilLiability::find($idslip->id);

                    if ($request->has('limit_event')) {
                        $object = new CompensationLimit([
                            'limit_event' => isset($request->limit_event) ? $request->limit_event : null,
                            'limit_annual' => isset($request->limit_annual) ? $request->limit_annual : null,
                        ]);

                        $type_slip->compensation_limit()->save($object);
                    }
                    $slip->slip_type_id = "9";

                    $type_slip->slip()->save($slip);

                    break;
                case 'riesgos_form':

                    $idslip = SlipFinancialRisk::create($request->all());
                    $type_slip = SlipFinancialRisk::find($idslip->id);

                    if ($request->has('description_compensation_limit')) {
                        for ($i = 0; $i < count($request->description_compensation_limit); $i++) {
                            if (isset($request->description_compensation_limit[$i])) {
                                $object = new CompensationLimit([
                                    'description_compensation_limit' => isset($request->description_compensation_limit[$i]) ? $request->description_compensation_limit[$i] : null,
                                ]);
                                $type_slip->compensation_limit()->save($object);
                            }
                        }
                    }

                    $slip->slip_type_id = "10";
                    $type_slip->slip()->save($slip);

                    break;
                default:
                    throw new Exception("Error Processing Request", 1);

                    break;
            }

            //cobertura
            if ($request->has('aditional_coverage')) {
                for ($i = 0; $i < count($request->aditional_coverage); $i++) {
                    if (isset($request->aditional_coverage[$i])) {
                        $coverage = new CoverageSlip([
                            'description_coverage' => isset($request->description_coverage[$i]) ? $request->description_coverage[$i] : null,
                            'aditional_coverage' => isset($request->aditional_coverage[$i]) ? $request->aditional_coverage[$i] : null,
                        ]);
                        $slip->coverage()->save($coverage);
                    }
                }
            }

            //limite de cobertura
            if ($request->has('limit_aditional_coverage')) {
                for ($i = 0; $i < count($request->limit_aditional_coverage); $i++) {
                    if (isset($request->limit_aditional_coverage[$i])) {
                        $coverage = new CoverageLimit([
                            'limit_description_coverage' => isset($request->limit_description_coverage[$i]) ? $request->limit_description_coverage[$i] : null,
                            'limit_aditional_coverage' => isset($request->limit_aditional_coverage[$i]) ? $request->limit_aditional_coverage[$i] : null,
                        ]);
                        $slip->limit_coverage()->save($coverage);
                    }
                }
            }

            //deducible
            if ($request->has('description_deductible')) {
                for ($i = 0; $i < count($request->description_deductible); $i++) {
                    if (isset($request->description_deductible[$i])) {
                        $deductible = new DeductibleSlip([
                            'description_deductible' => isset($request->description_deductible[$i]) ? $request->description_deductible[$i] : null,
                            'sinister_value' => isset($request->sinister_value[$i]) ? $request->sinister_value[$i] : null,
                            'insured_value' => isset($request->insured_value[$i]) ? $request->insured_value[$i] : null,
                            'minimum' => isset($request->minimum[$i]) ? $request->minimum[$i] : null,
                            'description2_deductible' => isset($request->description2_deductible[$i]) ? $request->description2_deductible[$i] : null,
                        ]);
                        $slip->deductible()->save($deductible);
                    }
                }
            }

            //Cláusulas adicionales
            if ($request->has('description_clause_additional')) {
                //$description_clause_additional = $request->description_clause_additional;
                for ($i = 0; $i < count($request->description_clause_additional); $i++) {
                    if (isset($request->description_clause_additional[$i])) {
                        $clause = new ClauseSlip([
                            'description_clause_additional' => $request->description_clause_additional[$i],
                            'clause_additional_additional' => isset($request->clause_additional_additional[$i]) ? $request->clause_additional_additional[$i] : null,
                            'clause_additional_additional2' => isset($request->clause_additional_additional2[$i]) ? $request->clause_additional_additional2[$i] : null,
                            'clause_additional_usd' => isset($request->clause_additional_usd[$i]) ? $request->clause_additional_usd[$i] : null,
                        ]);
                        $slip->clause_aditional()->save($clause);
                    }
                }
            }

            //coberturas adicionales
            if ($request->has('description_coverage_additional')) {
                //$iscovorage = $request->type_slip != 'rc' && $request->type_slip != 'transporte' && $request->type_slip != 'licencia' ? true : false;
                for ($i = 0; $i < count($request->description_coverage_additional); $i++) {
                    if (isset($request->description_coverage_additional[$i])) {
                        $coverage = new AdditionalCoverage([
                            'description_coverage_additional' => $request->description_coverage_additional[$i],
                            'coverage_additional_usd' => isset($request->coverage_additional_usd) ? $request->coverage_additional_usd[$i] : null,
                            'coverage_additional_additional' => isset($request->coverage_additional_additional) ? $request->coverage_additional_additional[$i] : null,
                            'coverage_additional_additional2' => isset($request->coverage_additional_additional2) ? $request->coverage_additional_additional2[$i] : null,
                        ]);
                        $slip->coverage_additional()->save($coverage);
                    }
                }
            }

            //Pago de garantia
            if ($request->has('installation')) {
                for ($i = 0; $i < count($request->installation); $i++) {
                    if (isset($request->installation[$i])) {
                        $gp = new GuaranteePayment([
                            'num_day' => isset($request->num_day[$i]) ? $request->num_day[$i] : null,
                            'installation' => isset($request->installation[$i]) ? $request->installation[$i] : null,
                            'date_payment' => isset($request->date_payment[$i]) ? $request->date_payment[$i] : null,
                            'description' => isset($request->description[$i]) ? $request->description[$i] : null,
                            'valor' => isset($request->valor[$i]) ? $request->valor[$i] : null,
                        ]);

                        $slip->guarantee_payment()->save($gp);
                    }
                }
            }

            //archivos
            /* if ($request->has("file")) {
                $files = $request->file;

                foreach ($files as $key) {
                    $newFile = new File([
                        'url_file' => $this->global_rut($key, 'file'),
                    ]);

                    $slip->file()->save($newFile);
                }
            } */

            return redirect()->route('compromiso')
                ->with('success', 'El slip se creó exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('compromiso')
                ->with('status', $th);
        }
    }

    public function pdfslip($id)
    {
        $slip = Slip::with('type')->with('country')->first();

        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("admin.tecnico.slip.pdf", [
            "name" => $slip->type->name,
            "country" => $slip->country->name,
        ]);
        return $dompdf->stream();
    }

    public function returnSlip($id)
    {
        $slip = Slip::find($id);
        $slip->slip_status_id = '2';
        $slip->update();
        $slip->save();

        return redirect()->back();
    }
}
