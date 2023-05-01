<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCoverage;
use App\Models\AviacionExtras;
use App\Models\BoatDetailSlip;
use App\Models\ClauseSlip;
use App\Models\CoberturasPilotos;
use App\Models\CompensationLimit;
use App\Models\CoverageSlip;
use App\Models\DeductibleSlip;
use App\Models\DetailPerdios;
use App\Models\EquiposElectronicosTable;
use App\Models\InformationAerialHelmets;
use App\Models\ObjectInsurance;
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
use App\Models\SlipTechnicalBranch;
use App\Models\SlipVehicle;
use App\Models\SumAssured;
use App\Models\VehicleDetail;
use App\Traits\HasUploadFiles;
use Illuminate\Http\Request;

class SlipApiController extends Controller
{
    use HasUploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Para validar si ya se mandó el form y sino, que se evite mandar demasiadas veces
        // if (!$this->checkToken($request)) {
        //     // The CSRF token did not match, so return an error response
        //     return response()->json([
        //         'message' => 'CSRF token mismatch',
        //     ], 422);
        // }

        $validatedData = $this->validateData($request);
        $basePath = "slips";
        //Guarda el slip general
        $slip = new Slip();
        $slip->fill($validatedData);
        $slip->slip_status_id = '2';
        $slip->save();



        //Guarda el slip según el tipo de slip (variable type_slip en los form blades)
        switch ($validatedData['type_slip']) {
            case 'vida_forms':
                $slip_vida = new SlipLifePersonlAccident();
                $slip_vida->fill($validatedData);
                $slip_vida->slip_id = $slip->id;
                $slip_vida->save();
                $slip->slip_type_id = "1";
                $slip->save();

                //Objeto del Seguro
                for ($i = 0; $i < count($request->birthday); $i++) {
                    if (isset($request->birthday[$i])) {
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

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);



                if ($request->hasFile('accidentRate')) {
                    $file = $request->file('accidentRate');
                    $this->saveFile($file, $this->getPath($basePath . '/vida/' . $slip_vida->id), "accidentRate");
                }

                break;


            case 'activos_fijos':
                $slip_activos_fijos = new SlipPropertyFixedAsset();
                $slip_activos_fijos->fill($validatedData);
                $slip_activos_fijos->slip_id = $slip->id;
                $slip_activos_fijos->save();
                $slip->slip_type_id = "2";
                $slip->save();
                $type_slip = SlipPropertyFixedAsset::where('id', $slip->id);
                //Suma Asegurada
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
                //Perdios
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

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $this->chargeDeductibles($request, $slip);
                $this->saveFilesFromRequest($request, $basePath, 'activos_fijos', $slip_activos_fijos->id, "activos-fijos");

                break;
            case 'vehiculo':
                $slip_vehiculos = new SlipVehicle();
                $slip_vehiculos->fill($validatedData);
                $slip_vehiculos->slip_id = $slip->id;
                $slip_vehiculos->save();
                $slip->slip_type_id = "3";
                $slip->save();

                // Guarda las placas del vehiculo
                $type_slip = SlipVehicle::where('id', $slip->id);


                //tabla vehiculos
                for ($i = 0; $i < count($request->plate_vehicle); $i++) {
                    if (isset($request->plate_vehicle[$i])) {
                        $plate = new VehicleDetail([
                            'plate_vehicle' => $request->plate_vehicle[$i] ?? null,
                            'slip_id' => $slip->id
                        ]);
                        $plate->save();
                    }
                }

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);

                $this->saveFilesFromRequest($request, $basePath, 'vehiculos',  $slip_vehiculos->id);

                break;
            case 'ramos_tecnicos_form':
                $slip_ramos_tecnicos = new SlipTechnicalBranch();
                $slip_ramos_tecnicos->fill($validatedData);
                $slip_ramos_tecnicos->slip_id = $slip->id;
                $slip_ramos_tecnicos->save();
                $slip->slip_type_id = "4";
                $slip->save();

                //Suma Asegurada
                for ($i = 0; $i < count($request->location); $i++) {
                    if (isset($request->location[$i])) {
                        $sumAssured = new SumAssured([
                            'location' => $request->location[$i] ?? null,
                            'machine' => $request->machine[$i] ?? null,
                            'slip_id' => $slip->id
                        ]);
                        $sumAssured->save();
                    }
                }
                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $this->saveFilesFromRequest($request, $basePath, 'tecnico',  $slip_ramos_tecnicos->id);

                break;
            case 'energia_form':
                $slip_energia = new SlipEnergy();
                $slip_energia->fill($validatedData);
                $slip_energia->slip_id = $slip->id;
                $slip_energia->save();
                $slip->slip_type_id = "5";
                $slip->save();

                $type_slip = SlipEnergy::find($slip->id);

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

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $this->saveFilesFromRequest($request, $basePath, 'energia',  $slip_energia->id);


                break;
            case 'maritimo_1_form':
            case 'maritimo_2_form':
            case 'maritimo_3_form':
            case 'maritimo_4_form':
                switch ($validatedData['type_slip']) {
                    case 'maritimo_1_form':
                        $slip_maritimo_1 = new SlipMaritimeOne();
                        $slip_maritimo_1->fill($validatedData);
                        $slip_maritimo_1->slip_id = $slip->id;
                        $slip_maritimo_1->save();
                        $type_slip = SlipMaritimeOne::where('id', $slip->id);

                        //Para crear barcos:
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
                                    'deducible_boat' => $request->deducible_boat[$i] ?? null,
                                    'slip_id' => $slip->id
                                ]);
                                $boats->save();
                            }
                        }

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_1',  $slip_maritimo_1->id);
                        break;
                    case 'maritimo_2_form':
                        $slip_maritimo_2 = new SlipMaritimeTwo();
                        $slip_maritimo_2->fill($validatedData);
                        $slip_maritimo_2->slip_id = $slip->id;
                        $slip_maritimo_2->save();
                        $type_slip = SlipMaritimeTwo::where('id', $slip->id);
                        //Para crear barcos:
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
                                    'deducible_boat' => $request->deducible_boat[$i] ?? null,
                                    'slip_id' => $slip->id
                                ]);
                                $boats->save();
                            }
                        }

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_2',  $slip_maritimo_2->id);
                        break;
                    case 'maritimo_3_form':
                        $slip_maritimo_3 = new SlipMaritimeThree();
                        $slip_maritimo_3->fill($validatedData);
                        $slip_maritimo_3->slip_id = $slip->id;
                        $slip_maritimo_3->save();
                        $type_slip = SlipMaritimeThree::where('id', $slip->id);

                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_3',  $slip_maritimo_3->id);
                        break;
                    case 'maritimo_4_form':
                        $slip_maritimo_4 = new SlipMaritimeFour();
                        $slip_maritimo_4->fill($validatedData);
                        $slip_maritimo_4->slip_id = $slip->id;
                        $slip_maritimo_4->save();
                        $type_slip = SlipMaritimeFour::where('id', $slip->id);
                        $this->saveFilesFromRequest($request, $basePath, 'maritimo_4',  $slip_maritimo_4->id);
                        break;
                    default:
                        break;
                }
                $slip->slip_type_id = "6";
                $slip->save();




                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);

                break;
            case 'aviacion_1_form':
            case 'aviacion_2_form':
            case 'aviacion_3_form':
                $slip->slip_type_id = "7";
                $slip->save();
                switch ($validatedData['type_slip']) {
                    case 'aviacion_1_form':
                        $slip_aereo = new SlipAviationOne();
                        $slip_aereo->fill($validatedData);
                        $slip_aereo->slip_id = $slip->id;
                        $slip_aereo->save();
                        $type_slip = SlipAviationOne::find($slip->id);

                        // Datos de la aeronave
                        if (isset($request->type_ala_aerial)) {
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
                                        'deducible_aerial' => $request->deducible_aerial[$i] ?? null,
                                        'slip_id' => $slip->id
                                    ]);
                                    $informationAerialHelmet->save();
                                }
                            }
                        }

                        //coberturas y limite de coberturas
                        if (isset($request->description_coverage)) {
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
                        }

                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_1',  $slip_aereo->id);
                        break;
                    case 'aviacion_2_form':
                        $slip_aereo_2 = new SlipAviationTwo();
                        $slip_aereo_2->fill($validatedData);
                        $slip_aereo_2->slip_id = $slip->id;
                        $slip_aereo_2->save();

                        $type_slip = SlipAviationTwo::where('id', $slip->id);

                        //coberturas adicionales
                        for ($i = 0; $i < count($request->description_coverage_additional); $i++) {
                            if (isset($request->description_coverage_additional[$i])) {
                                $additional_coverages = new CoberturasPilotos([
                                    'description_coverage_additional' => $request->description_coverage_additional[$i] ?? null,
                                    'coverage_additional_additional' => $request->coverage_additional_additional[$i] ?? null,
                                    'coverage_additional_usd' => $request->coverage_additional_usd[$i] ?? null,
                                    'coverage_additional_additional2' => $request->coverage_additional_additional2[$i] ?? null,
                                    'sum_assured' => $request->sum_assured[$i] ?? null,
                                    'pilots_quantity' => $request->pilots_quantity[$i] ?? null,
                                    'total_assured' => $request->total_assured[$i] ?? null,
                                    'slip_id' => $slip->id
                                ]);
                                $additional_coverages->save();
                            }
                        }

                        //Objeto del Seguro
                        for ($i = 0; $i < count($request->birthday); $i++) {
                            if (isset($request->birthday[$i])) {
                                $object_insurance = new ObjectInsurance([
                                    'limit' => $request->limit[$i] ?? null,
                                    'age' => $request->age[$i] ?? null,
                                    'birthday' => $request->birthday[$i] ?? null,
                                    'name' => $request->name[$i] ?? null,
                                    'person_type' => $request->person_type[$i] ?? null,
                                    'slip_id' => $slip->id
                                ]);
                                $object_insurance->save();
                            }
                        }

                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_2',  $slip_aereo_2->id);
                        break;
                    case 'aviacion_3_form':
                        $slip_aereo_3 = new SlipAviationThree();
                        $slip_aereo_3->fill($validatedData);
                        $slip_aereo_3->slip_id = $slip->id;
                        $slip_aereo_3->save();

                        // Datos de la aeronave
                        if (isset($request->type_ala_aerial)) {
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
                                        'deducible_aerial' => $request->deducible_aerial[$i] ?? null,
                                        'slip_id' => $slip->id
                                    ]);
                                    $informationAerialHelmet->save();
                                }
                            }
                        }

                        $type_slip = SlipAviationThree::where('id', $slip->id);
                        $this->saveFilesFromRequest($request, $basePath, 'aviacion_3',  $slip_aereo_3->id);
                        break;
                    default:
                        break;
                }


                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $slip->save();
                break;
            case 'finanzas_1_form':
            case 'finanzas_2_form':
                $slip->slip_type_id = "8";
                switch ($validatedData['type_slip']) {
                    case 'finanzas_1_form':
                        $slip_finanzas_1 = new SlipFianzaOne();
                        $slip_finanzas_1->fill($validatedData);
                        $slip_finanzas_1->slip_id = $slip->id;
                        $slip_finanzas_1->save();
                        $type_slip = SlipFianzaOne::find($slip->id);

                        //objeto asegurado
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

                        $this->saveFilesFromRequest($request, $basePath, 'finanzas_1',  $slip_finanzas_1->id);
                        break;
                    case 'finanzas_2_form':
                        $slip_finanzas_2 = new SlipFianzaTwo();
                        $slip_finanzas_2->fill($validatedData);
                        $slip_finanzas_2->slip_id = $slip->id;
                        $slip_finanzas_2->save();
                        $type_slip = SlipFianzaTwo::find($slip->id);
                        $this->saveFilesFromRequest($request, $basePath, 'finanzas_2',  $slip_finanzas_2->id);
                        break;
                    default:
                        break;
                }





                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                break;
            case 'responsabilidad_form':
                $slip_responsabilidad = new SlipCivilLiability();
                $slip_responsabilidad->fill($validatedData);
                $slip_responsabilidad->slip_id = $slip->id;
                $slip_responsabilidad->save();
                $slip->slip_type_id = "9";

                $type_slip = SlipCivilLiability::where('id', $slip->id);

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $this->saveFilesFromRequest($request, $basePath, 'responsabilidad',  $slip_responsabilidad->id);

                break;
            case 'riesgos_form':
                $slip_riesgos = new SlipFinancialRisk();
                $slip_riesgos->fill($validatedData);
                $slip_riesgos->slip_id = $slip->id;
                $slip_riesgos->save();
                $slip->slip_type_id = "10";

                $type_slip = SlipFinancialRisk::where('id', $slip->id);

                //objeto asegurado
                for ($i = 0; $i < count($request->activity_merchant); $i++) {
                    if (isset($request->activity_merchant[$i])) {
                        $object_insurance = new ObjectInsurance([
                            'name' => $request->name[$i] ?? null,
                            'activity_merchant' => $request->activity_merchant[$i] ?? null,
                            'limit' => $request->limit[$i] ?? null,
                            'slip_id' => $slip->id
                        ]);
                        $object_insurance->save();
                    }
                }

                //coberturas adicionales
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

                //clausulas adicionales
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

                //deductibles
                $this->chargeDeductibles($request, $slip);
                $this->saveFilesFromRequest($request, $basePath, 'riesgo',  $slip_riesgos->id);
                break;
            default:
                break;
        }

        //TODO: Agregar las columnas que se agregan de manera dinámica

        if (
            isset($value['location'], $value['edification'], $value['contents'], $value['equipment'], $value['machine'], $value['commodity'], $value['other_sum_assured'])
            && !SumAssured::where('slip_id', $slip->id)->exists()
        ) {
            $this->storeSuma($request, $slip);
        }

        // Para la tabla de equipos electronicos
        if (
            isset($value['todo_riesgo'], $value['portadores_externos'], $value['incremento_costos'], $value['limite_diario'], $value['periodo_cobertura'], $value['total_cuadro1'], $value['todo_riesgo2'], $value['portadores_externos2'], $value['incremento_costos2'], $value['total_cuadro2'], $value['limite_indemnizacion'], $value['asegurable_electronico'], $value['asegurada_electronico'])
        ) {
            $this->storeElectronicos($validatedData, $slip);
        }

        // Para la tabla de predios activos fijos
        if (
            isset($value['province_perdios'], $value['city_perdios'], $value['direction_perdios'])
        ) {
            $this->storePredios($validatedData, $slip);
        }

        // Para la tabla de coberturas adicionales
        if (
            isset($value['description_coverage_additional'], $value['coverage_additional_additional'], $value['coverage_additional_usd'], $value['coverage_additional_additional2'])
        ) {
            $this->storeCoberturas($validatedData, $slip);
        }

        // Para la tabla de clausulas adicionales
        if (
            isset($value['description_clause_additional'], $value['clause_additional_additional'], $value['clause_additional_usd'], $value['clause_additional_additional2'])
        ) {
            $this->storeClausulas($validatedData, $slip);
        }

        //Para deducibles
        /* if (
            isset($validatedData['description_deductible'], $validatedData['sinister_value'], $validatedData['minimum'], $validatedData['description2_deductible'])
        ) {
            $this->storeDeducciones($validatedData, $slip);
        } */


        //Para guardar los archivos
        // foreach ($request->file() as $input_name => $file) {
        //     if ($request->hasFile($input_name)) {
        //         $validatedData = $request->validate([
        //             $input_name => 'file|mimetypes:application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*,text/csv|max:16384', // validate the uploaded file
        //             'type' => 'required|string',
        //             'slip_id' => ['required', Rule::exists('slips', 'id')->where(function ($query) use ($slip) {
        //                 $query->where('id', $slip->id);
        //             })],
        //         ]);

        //         $path = $file->storeAs(
        //             "{$validatedData['type']}/{$validatedData['slip_id']}/{$input_name}",
        //             $file->getClientOriginalName()
        //         );

        //         $fileModel = new File();
        //         $fileModel->path = $path;
        //         $fileModel->type = $validatedData['type'];
        //         $fileModel->slip_id = $validatedData['slip_id'];
        //         $fileModel->input_name = $input_name;
        //         $fileModel->save();
        //     }
        // }

        return response()->json(['success', $slip]);
    }

    private function checkToken($request)
    {
        if (!$request->hasSession()) {
            return false;
        }

        $sessionToken = $request->session()->get('csrf_token');

        if (!$sessionToken) {
            // No token se encontró el token, guarda el token del input y retorna true
            $request->session()->put('csrf_token', $request->session()->token());
            return true;
        }

        $requestToken = $request->input('csrf_token');

        if ($sessionToken !== $requestToken) {
            // CSRF token mismatch, guarda el token actual y retorna false
            $request->session()->put('csrf_token', $request->session()->token());
            return false;
        }

        // coincide el CSRF token, retira el token guardado y retorna true
        $request->session()->forget('csrf_token');
        return true;
    }

    /**
     * Validacion de los inputs
     */
    private function validateData(Request $request)
    {
        // dd($request);
        $validatedData =  $request->validate([
            'type_slip' => 'nullable|string|max:100',
            'type_coverage' => 'nullable|string|max:100',
            'country_id' => 'nullable|numeric|max:200',
            'broker' => 'nullable|string|min:0',
            'insuranceBroker' => 'nullable|string|min:0|max:500',
            'coin' => 'nullable|string|min:0|max:250',
            'equivalence' => 'nullable|numeric|min:0',
            'assignor' => 'nullable|string',
            'retrocedente' => 'nullable|string|min:0',
            'sector' => 'nullable|string|min:6|max:7',
            'insurer' => 'nullable|string|min:0|max:255',
            'activity' => 'nullable|string|min:0|max:255',
            'first_risk' => 'nullable|string|min:0|max:255',
            'object_insurance' => 'nullable|string|min:0|max:5000',
            'object_insured' => 'nullable|string|min:0|max:2000',
            'person_insured' => 'nullable|string|min:0|max:300',
            'direction' => 'nullable|string|min:0|max:700',
            'validity_since' => 'nullable|date_format:Y-m-d',
            'validity_until' => 'nullable|date_format:Y-m-d',
            'from_date_mount_fianza' => 'nullable|date_format:Y-m-d',
            'to_date_mount_fianza' => 'nullable|date_format:Y-m-d',
            'from_date_mount_contract' => 'nullable|date_format:Y-m-d',
            'to_date_mount_contract' => 'nullable|date_format:Y-m-d',
            'coverage' => 'nullable|string|min:0|max:2000',
            'user_id' => 'nullable|numeric|min:1|max:100',
            'location.*' => 'nullable|string|min:0|max:255',
            'edification.*' => 'nullable|numeric',
            'contents.*' => 'nullable|numeric',
            'equipment.*' => 'nullable|numeric',
            'machine.*' => 'nullable|numeric',
            'commodity.*' => 'nullable|numeric',
            'other_sum_assured.*' => 'nullable|numeric',
            'limit_compensation' => 'nullable|numeric|min:0|max:9999999999999999',
            'main_risk' => 'nullable|string|min:0|max:9999999999',
            'insured_sum' => 'nullable|numeric|max:9999999999999999',
            'insurable_sum' => 'nullable|numeric|max:9999999999999999',
            'object_insured_value' => 'nullable|numeric|max:9999999999999999',
            'person_insured_value' => 'nullable|numeric|max:9999999999999999',
            'province_perdios.*' => 'nullable|string',
            'city_perdios.*' => 'nullable|string',
            'direction_perdios.*' => 'nullable|string',
            'description_coverage.*' => 'nullable|string',
            'aditional_coverage.*' => 'nullable|string',
            'description_coverage_additional.*' => 'nullable|string',
            'coverage_additional_additional.*' => 'nullable|string',
            'coverage_additional_usd.*' => 'nullable|numeric',
            'coverage_additional_additional2.*' => 'nullable|string',
            'description_clause_additional.*' => 'nullable|string',
            'clause_additional_additional.*' => 'nullable|string',
            'clause_additional_usd.*' => 'nullable|numeric',
            'clause_additional_additional2.*' => 'nullable|string',
            'valor_asegurado' => 'nullable|numeric|min:0|max:9999999999999999',
            'reinsurer_rate' => 'nullable|numeric|min:0|max:9999999999999999',
            'reinsurance_premium' => 'nullable|numeric|min:0|max:9999999999999999',
            'description_deductible.*' => 'nullable|string|max:255',
            'sinister_value.*' => 'nullable|string|max:255',
            'insurable_value' => 'nullable|numeric|min:0|max:9999999999999999',
            'minimum.*' => 'nullable|string|max:255',
            'description2_deductible.*' => 'nullable|string|max:255',
            'name.*' => 'nullable|string|min:0|max:70',
            'birthday.*' => 'nullable|date_format:Y-m-d',
            'age.*' => 'nullable|numeric|min:0|max:99',
            'sex_merchant.*' => 'nullable|string|min:0|max:10',
            'activity_merchant.*' => 'nullable|string|min:0|max:1500',
            'limit.*' => 'nullable|string|min:0|max:1500',
            'plate_vehicle.*' => 'nullable|string|max:9',
            'description_compensation_limit' => 'nullable|string|max:1024',
            'description_compensation_limit2' => 'nullable|string|max:1024',
            'description_compensation_limit3' => 'nullable|string|max:1024',
            'limit_event' => 'nullable|numeric|max:9999999999999999',
            'limit_annual' => 'nullable|numeric|max:9999999999999999',
            'ingress_present_year' => 'nullable|numeric|max:9999999999999999',
            'ingress_previous_year' => 'nullable|numeric|max:9999999999999999',
            'ingress_next_year' => 'nullable|numeric|max:9999999999999999',
            'num_employee' => 'nullable|numeric|max:9999999999999999',
            'num_vehicle' => 'nullable|numeric|max:9999999999999999',
            'value_payroll' => 'nullable|numeric|max:9999999999999999',
            'serie_aerial.*' => 'nullable|string',
            'marca_aerial.*' => 'nullable|string',
            'model_aerial.*' => 'nullable|string',
            'year_manufacture_aerial.*' => 'nullable|numeric',
            'cap_crew.*' => 'nullable|numeric',
            'cap_pax.*' => 'nullable|numeric',
            'sum_insured.*' => 'nullable|numeric',
            'aditional_coverage.*' => 'nullable|string',
            'limit_description_coverage.*' => 'nullable|string',
            'limit_aditional_coverage.*' => 'nullable|string',
            'geography_limit' => 'nullable|string',
            'pilot_authorized' => 'nullable|string',
            'limit_aggregate' => 'nullable|numeric|max:99999999999999999',
            'unsecured_obligation' => 'nullable|string|max:1500',
            'entrenched' => 'nullable|string|max:1500',
            'beneficiary' => 'nullable|string|max:1500',
            'type_fianza' => 'nullable|string|max:1500',
            'mount_fianza' => 'nullable|numeric|max:9999999999999999',
            'mount_contract' => 'nullable|numeric|max:9999999999999999',
            'contract_percentage' => 'nullable|numeric|min:0|max:100',
            'name_boat.*' => 'nullable|string|max:255',
            'registration_boat.*' => 'nullable|string|max:255',
            'material_boat.*' => 'nullable|string|max:20',
            'manga_boat.*' => 'nullable|numeric|max:999999999999999',
            'eslora_boat.*' => 'nullable|numeric|max:999999999999999',
            'puntual_boat.*' => 'nullable|numeric|max:999999999999999',
            'shell_boat.*' => 'nullable|numeric|max:999999999999999',
            'machine_boat.*' => 'nullable|numeric|max:999999999999999',
            'use_boat' => 'nullable|string|max:25',
            'construction_material' => 'nullable|string|max:25',
            'agreed_value' => 'nullable|numeric|max:99999999999999999',
            'name_armador' => 'nullable|string|max:50',
            'detalle_viajeText' => 'nullable|string|max:500',
            'navigation' => 'nullable|string|max:500',
            'modalidad' => 'nullable|string|max:5',
            'detail_boat' => 'nullable|string|max:500',
            'type_packing' => 'nullable|string|max:15',
            'type_unify' => 'nullable|string|max:15',
            'transportation' => 'nullable|string|max:15',
            'type_merchandise' => 'nullable|string|max:15',
            'annual_mobilization' => 'nullable|numeric|max:9999999999999999',
            'limit_colusorio_value' => 'nullable|numeric|max:9999999999999999',
            'limit_shipment' => 'nullable|numeric|max:9999999999999999',
            'departure_date' => 'nullable|date_format:Y-m-d',
            'arrival_date' => 'nullable|date_format:Y-m-d',
            'status_transport' => 'nullable|string|max:15',
            'insured_journey' => 'nullable|string|max:15',
            'ismerchandise' => 'nullable|string|max:2',
            'entrance' => 'nullable|string|max:255',
            'th_sum_assured_1' => 'nullable|string|max:255',
            'th_sum_assured_2' => 'nullable|string|max:255',
            'th_sum_assured_3' => 'nullable|string|max:255',
            'th_sum_assured_4' => 'nullable|string|max:255',
            'th_sum_assured_5' => 'nullable|string|max:255',
            'limit_colusorio_text' => 'nullable|string|max:255',
            'bailText' => 'nullable|string|max:255',
            'custodia' => 'nullable|string|max:255',
            'todo_riesgo' => 'nullable|numeric|max:999999999999999',
            'portadores_externos' => 'nullable|numeric|max:999999999999999',
            'incremento_costos' => 'nullable|numeric|max:999999999999999',
            'limite_diario' => 'nullable|numeric|max:999999999999999',
            'periodo_cobertura' => 'nullable|numeric|max:999999999999999',
            'total_cuadro1' => 'nullable|numeric|max:999999999999999',
            'todo_riesgo2' => 'nullable|numeric|max:999999999999999',
            'portadores_externos2' => 'nullable|numeric|max:999999999999999',
            'incremento_costos2' => 'nullable|numeric|max:999999999999999',
            'total_cuadro2' => 'nullable|numeric|max:999999999999999',
            'limite_indemnizacion' => 'nullable|numeric|max:999999999999999',
            'asegurable_electronico' => 'nullable|numeric|max:999999999999999',
            'asegurada_electronico' => 'nullable|numeric|max:999999999999999',
            'accidentRate' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'desglose_file' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'devices_list_file' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'machine_list_file' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'inspection_control_file' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'quote_form_file' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'informe' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'quotationReport' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'financialStatements' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'coverageDetail' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'schedule' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'soilStudy' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'quotationForm' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'experience' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'alopQuote' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'workMemory' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'modelMakeHours' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'crFormSigned' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'pilotExperienceFormSigned' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'otherForms' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'pilotos' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'signedForm' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'medicTest' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'financialReport' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'copiaMatricula' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'informeInspeccion' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'siniestralidad_armador' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'otrasEmbarcaciones' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'experienciaArmador' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'detalleMantenimiento' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'tripulacionInfo' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'detalleViajeFile' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'detalleValorReemplazo' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'formularioFirmado' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'siniestralidad_embarcacion' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'detalleLicencia' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
            'report' => 'nullable|file|mimetypes:application/*,text/csv|max:16384', //permite archivos de hasta máximo 16MB
        ]); //aviacion rc no hay

        $is_array = is_array($request->input('insured_value'));
        $validatedData['insured_value' . ($is_array ? '.*' : '')] = $is_array ? $request->validate(['insured_value.*' => 'nullable|numeric|max:99999999999999']) : $request->validate(['insured_value' => 'nullable|numeric|max:9999999999999999']);

        return $validatedData;
    }

    /**
     * Store tablas
     */
    // private function storeElectronicos($validatedData, $slip)
    // {
    //     $electronicos = new EquiposElectronicosTable();
    //     $electronicos->todo_riesgo = $validatedData['todo_riesgo'] ?? null;
    //     $electronicos->portadores_externos = $validatedData['portadores_externos'] ?? null;
    //     $electronicos->incremento_costos = $validatedData['incremento_costos'] ?? null;
    //     $electronicos->limite_diario = $validatedData['limite_diario'] ?? null;
    //     $electronicos->periodo_cobertura = $validatedData['periodo_cobertura'] ?? null;
    //     $electronicos->total_cuadro1 = $validatedData['total_cuadro1'] ?? null;
    //     $electronicos->todo_riesgo2 = $validatedData['todo_riesgo2'] ?? null;
    //     $electronicos->portadores_externos2 = $validatedData['portadores_externos2'] ?? null;
    //     $electronicos->incremento_costos2 = $validatedData['incremento_costos2'] ?? null;
    //     $electronicos->total_cuadro2 = $validatedData['total_cuadro2'] ?? null;
    //     $electronicos->limite_indemnizacion = $validatedData['limite_indemnizacion'] ?? null;
    //     $electronicos->asegurable_electronico = $validatedData['asegurable_electronico'] ?? null;
    //     $electronicos->asegurada_electronico = $validatedData['asegurada_electronico'] ?? null;
    //     $electronicos->slip_id = $slip->id;
    //     $slip->electronicos()->save($electronicos);
    // }

    private function storeElectronicos($validatedData, $slip)
    {
        $electronicosData = array_merge($validatedData, ['slip_id' => $slip->id]);
        $electronicos = new EquiposElectronicosTable();
        $electronicos->fill($electronicosData)->save();
    }


    private function storeSuma($request, $slip)
    {
        for ($i = 0; $i < count($request->location); $i++) {
            if (isset($request->location[$i])) {
                $sumAssured = new SumAssured([
                    'location' => $request->location[$i] ?? null,
                    'edification' => $request->edification[$i] ?? null,
                    'contents' => $request->contents[$i] ?? null,
                    'equipment_name' => $request->equipment_name[$i] ?? null,
                    'machine' => $request->machine[$i] ?? null,
                    'commodity' => $request->commodity[$i] ?? null,
                    'other_sum_assured' => $request->other_sum_assured[$i] ?? null,
                    'slip_id' => $slip->id
                ]);
                $sumAssured->save();
            }
        }
    }

    private function storePredios($validatedData, $slip)
    {
        foreach ($validatedData['city_perdios'] as $value) {
            $predios = new DetailPerdios();
            $predios->province_predios = $value['province_perdios'] ?? null;
            $predios->city_predios = $value['city_perdios'] ?? null;
            $predios->direction_predios = $value['direction_perdios'] ?? null;
            $slip->predios()->save($predios);
        }
    }
    private function storeCoberturas($validatedData, $slip)
    {
        foreach ($validatedData['description_coverage'] as $value) {
            $coverages = new CoverageSlip();
            $coverages->description_coverage = $value['description_coverage'] ?? null;
            $coverages->additional_coverage = $value['additional_coverage'] ?? null;
            $coverages->save();
        }

        foreach ($validatedData['description_coverage_additional'] as $value) {
            $coverages = new AdditionalCoverage();
            $coverages->description_coverage_additional = $value['description_coverage_additional'] ?? null;
            $coverages->coverage_additional_additional = $value['coverage_additional_additional'] ?? null;
            $coverages->coverage_additional_usd = $value['coverage_additional_usd'] ?? null;
            $coverages->coverage_additional_additional2 = $value['coverage_additional_additional2'] ?? null;
            $slip->coverage()->save($coverages);
        }
    }
    private function storeClausulas($validatedData, $slip)
    {
        foreach ($validatedData['description_clause_additional'] as $value) {
            $clauses = new ClauseSlip();
            $clauses->description_clause_additional = $value['description_clause_additional'] ?? null;
            $clauses->clause_additional_additional = $value['clause_additional_additional'] ?? null;
            $clauses->clause_additional_usd = $value['clause_additional_usd'] ?? null;
            $clauses->clause_additional_additional2 = $value['clause_additional_additional2'] ?? null;
            $slip->clause_aditional()->save($clauses);
        }
    }
    private function storeDeducciones($validatedData, $slip)
    {
        foreach ($validatedData['description_deductible'] as $key => $value) {
            $deductible = new DeductibleSlip();
            $deductible->description_deductible = $value['description_deductible'][$key] ?? null;
            $deductible->sinister_value = $value['sinister_value'][$key] ?? null;
            $deductible->insured_value = $value['insured_value'][$key] ?? null;
            $deductible->minimum = $value['minimum'][$key] ?? null;
            $deductible->description2_deductible = $value['description2_deductible'][$key] ?? null;
            $deductible->slip_id = $slip->id;
            $deductible->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function chargeDeductibles(Request $request, Slip $slip)
    {
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
}
