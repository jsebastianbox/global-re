<?php

namespace App\Traits;

use App\Models\AviacionExtras;
use App\Models\BoatDetailSlip;
use App\Models\Clausulas_selector;
use App\Models\CoberturasSelector;
use App\Models\exclusiones_selectors;
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

trait HasSlipsType
{
    use HasUploadFiles;
    public function getSlipType(Slip $slip)
    {
        $id = $slip->id;
        $slip_type = null;
        $slip_case = null;

        switch ($slip->type_coverage) {
            case '1':
            case '2':
            case '3':
            case '4':
                $slip_type = SlipLifePersonlAccident::where('slip_id', $id)->first();
                $slip_case = 'vida';
                break;
            case '5':
            case '6':
            case '7':
            case '8':
                $slip_type = SlipPropertyFixedAsset::where('slip_id', $id)->first();
                $slip_case = 'activos_fijos';
                break;

            case '9':
            case '10':
                $slip_type = SlipVehicle::where('slip_id', $id)->first();
                $slip_case = 'vehiculos';
                break;
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                $slip_type = SlipTechnicalBranch::where('slip_id', $id)->first();
                $slip_case = 'tecnico';
                break;
            case '18':
            case '19':
            case '20':
                $slip_type = SlipEnergy::where('slip_id', $id)->first();
                $slip_case = 'energia';
                break;

            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('slip_id', $id)->first();
                $slip_case = 'maritimo_1';
                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('slip_id', $id)->first();
                $slip_case = 'maritimo_2';
                break;

            case '24':
            case '25':
            case '26':
                $slip_type = SlipMaritimeThree::where('slip_id', $id)->first();
                $slip_case = 'maritimo_3';
                break;

            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                $slip_type = SlipMaritimeFour::where('slip_id', $id)->first();
                $slip_case = 'maritimo_4';
                break;

            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('slip_id', $id)->first();
                $slip_case = 'aviacion_1';
                break;

            case '34':
                $slip_type = SlipAviationTwo::where('slip_id', $id)->first();
                $slip_case = 'aviacion_2';
                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('slip_id', $id)->first();
                $slip_case = 'aviacion_3';
                break;

            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':
                $slip_type = SlipCivilLiability::where('slip_id', $id)->first();
                $slip_case = 'responsabilidad';
                break;

            case '44':
            case '45':
                $slip_type = SlipFinancialRisk::where('slip_id', $id)->first();
                $slip_case = 'riesgo';
                break;

            case '46':
                $slip_type = SlipFianzaOne::where('slip_id', $id)->first();
                $slip_case = 'finanzas_1';
                break;

            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                $slip_type = SlipFianzaTwo::where('slip_id', $id)->first();
                $slip_case = 'finanzas_2';
                break;

            default:
                break;
        }
        return [$slip_type, $slip_case];
    }
    public function getSlipWithExtras(Slip $slip)
    {

        //variables nulls para no tirar error
        $object_insurance = [];
        $sum_assured = [];
        $vehicles_details = [];
        $boat_detail = [];
        $information_aerial = [];
        $aviation_extras = [];
        $exclusionesSelect = [];

        switch ($slip->type_coverage) {
            case '1':
            case '2':
            case '3':
            case '4':
                $slip_type = SlipLifePersonlAccident::where('slip_id', $slip->id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'vida')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'vida')->get();
                $exclusionesSelect = exclusiones_selectors::all();
                break;
            case '5':
            case '6':
            case '7':
            case '8':
                $slip_type = SlipPropertyFixedAsset::where('slip_id', $slip->id)->first();
                $sum_assured = SumAssured::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'activos')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'activos')->get();

                break;

            case '9':
            case '10':
                $slip_type = SlipVehicle::where('slip_id', $slip->id)->first();
                $vehicles_details = VehicleDetail::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'tecnico')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'tecnico')->get();

                break;
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                $slip_type = SlipTechnicalBranch::where('slip_id', $slip->id)->first();
                $sum_assured = SumAssured::where('slip_id', $slip->id)->get();

                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'tecnico')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'tecnico')->get();

                break;
            case '18':
            case '19':
            case '20':
                $slip_type = SlipEnergy::where('slip_id', $slip->id)->first();
                $sum_assured = SumAssured::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::where('main_branch', 'energia')->get();
                $clausulasSelect = Clausulas_selector::where('main_branch', 'energia')->get();

                break;

            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('slip_id', $slip->id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('slip_id', $slip->id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '24':
            case '25':
            case '26':
                $slip_type = SlipMaritimeThree::where('slip_id', $slip->id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                $slip_type = SlipMaritimeFour::where('slip_id', $slip->id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('slip_id', $slip->id)->first();
                $information_aerial = InformationAerialHelmets::where('slip_id', $slip->id)->get();
                $aviation_extras = AviacionExtras::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '34':
                $slip_type = SlipAviationTwo::where('slip_id', $slip->id)->first();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('slip_id', $slip->id)->first();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':
                $slip_type = SlipCivilLiability::where('slip_id', $slip->id)->first();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '44':
            case '45':
                $slip_type = SlipFinancialRisk::where('slip_id', $slip->id)->first();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '46':
                $slip_type = SlipFianzaOne::where('slip_id', $slip->id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $slip->id)->get();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                $slip_type = SlipFianzaTwo::where('slip_id', $slip->id)->first();
                //clausulas y cobertura to find
                $coberturasSelect = CoberturasSelector::all();
                $clausulasSelect = Clausulas_selector::all();

                break;

            default:
                return 'other';
                break;
        }


        return [$slip_type, [
            $sum_assured,
            $boat_detail,
            $information_aerial,
            $aviation_extras,
            $vehicles_details,
            $coberturasSelect,
            $exclusionesSelect,
            $clausulasSelect,
            $object_insurance

        ]];
    }

    public function getFileInfo($name): array
    {
        $file_info = [
            'name' => null,
            'file' => null,
            'extension' => null,

        ];
        switch ($name) {

            case "siniestralidadCincoAnios":
                $file_info['name'] = "Siniestralidad embarcación";
                break;
            case "accidentRate":
                $file_info['name'] = "Siniestralidad últimos 5 años";
                break;

            case "quote_form_file":
                $file_info['name'] = "Formularios de cotización";
                break;
            case "inspection_control_file":
                $file_info['name'] = "Informe de inspección";
                break;
            case "machine_list_file":
                $file_info['name'] = "Listado de maquinaria";
                break;
            case "devices_list_file":
                $file_info['name'] = "Listado de equipos";
                break;
            case "desglose_file":
                $file_info['name'] = "Detalle/Desglose";
                break;
            case "informe":
                $file_info['name'] = "Informe de inspección";
                break;
            case "coverageDetail":
                $file_info['name'] = "Detalle de bienes asegurados";
                break;
            case "schedule":
                $file_info['name'] = "Cronograma";
                break;
            case "soilStudy":
                $file_info['name'] = "Estudio de suelos";
                break;
            case "quotationForm":
                $file_info['name'] = "Formulario de cotización";
                break;
            case "experience":
                $file_info['name'] = "Experiencia";
                break;

            case "workMemory":
                $file_info['name'] = "Memoria de la obra";
                break;
            case "valueDetail":
                $file_info['name'] = "Detalle/Desglose: ubicación rubro";
                break;

            case "petroleumDenValue":
                $file_info['name'] = "etalle/Desglose:pozo energia";
                break;

            case "report":
                $file_info['name'] = "Informe de inspección";
                break;

            case "anualIncome":
                $file_info['name'] = "Ingresos estimados anuales";
                break;

            case "employees":
                $file_info['name'] = "Informe de inspección";
                break;

            case "vehicles":
                $file_info['name'] = "No. Vehículos";
                break;

            case "payroll":
                $file_info['name'] = "Valor de la nómina";
                break;
            case "dailyProduction":
                $file_info['name'] = "Produccion barriles por día";
                break;
            case "barrelValue":
                $file_info['name'] = "Costo extracción por barril";
                break;
            case "quotationReport":
                $file_info['name'] = "Formulario cotización relleno y firmado";
                break;

            case "financialStatements":
                $file_info['name'] = "Estados financieros";
                break;

                break;

            case "quotationReport":
                $file_info['name'] = "Siniestralidad";
                break;

            case "financialStatements":
                $file_info['name'] = "Siniestralidad";
                break;
            case "modelMakeHours":
                $file_info['name'] = "Horas en marca y modelo";
                break;
            case "otherForms":
                $file_info['name'] = "Formularios Hangares y formularios varios por cobertura";
                break;

            case "crFormSigned":
                $file_info['name'] = "Formulario casco relleno y firmado";
                break;

            case "pilotExperienceFormSigned":
                $file_info['name'] = "Formulario experiencia pilotos: relleno y firmado";
                break;

            case "pilotos":
                $file_info['name'] = "Detalle pilotos asegurados";
                break;

            case "signedForm":
                $file_info['name'] = "Formulario cotización: relleno y firmado";
                break;

            case "medicTest":
                $file_info['name'] = "Exámenes médicos";
                break;

            case "copiaMatricula":
                $file_info['name'] = "Copia matrícula embarcación";
                break;
            case "informeInspeccion":
                $file_info['name'] = "Informe inspección actualizado";
                break;
            case "siniestralidad_armador":
                $file_info['name'] = "Siniestralidad armador";
                break;
            case "otrasEmbarcaciones":
                $file_info['name'] = "Otras embarcaciones armador";
                break;

            case "experienciaArmador":
                $file_info['name'] = "Experiencia armador otras embarcaciones";
                break;
            case "detalleMantenimiento":
                $file_info['name'] = "Detalles de mantenimiento: incluyendo maquinaria y costos";
                break;
            case "tripulacionInfo":
                $file_info['name'] = "Información de la tripulación";
                break;
            case "detalleLicencia":
                $file_info['name'] = "Detalle licencias requerida para navegación";
                break;
            case "detalleViaje":
                $file_info['name'] = "Detalles de los viajes de pesca (en
                    caso de requerir casco pesquero)";
                break;
            case "detalleValorReemplazo":
                $file_info['name'] = "Detalle valor para reemplazar maquinaria";
                break;
            case "formularioFirmado":
                $file_info['name'] = "Formulario relleno y firmado";
                break;


            case "financialReport":
                $file_info['name'] = "Formulario cotización relleno y firmado";
                break;
            case "sourceDoc":
                $file_info['name'] = "Documento fuente";
                break;
            default:
                break;
        }
        return $file_info;
    }

    public function getFilesListed(string $case, $id, string $route = null)
    {
        $route = $route ?? $case;
        $files_info = [];
        if ($route == 'activos_fijos') {
            $route = 'activos-fijos';
        }
        $files_names = $this->keysFiles($case);
        foreach ($files_names as $name) {
            $file_info = $this->getFileInfo($name);
            $file_path = 'slips/' . $route . '/' . $id . '/' . $name . '.*';
            if ($file = $this->getFile($file_path)) {
                $file_info['file'] = $this->getBase64FromFile($file);
                $file_info['extension'] = $this->getExtensionFromName($file);
                $files_info[] = $file_info;
            }
        }
        return $files_info;
    }
}
