<?php

namespace App\Traits;

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

trait HasSlipsType
{
    public function getSlipType(Slip $slip)
    {
        $id = $slip->id;
        $slip_type = null;
        switch ($slip->type_coverage) {
            case '1':
            case '2':
            case '3':
            case '4':
                $slip_type = SlipLifePersonlAccident::where('slip_id', $id)->first();
                break;
            case '5':
            case '6':
            case '7':
            case '8':
                $slip_type = SlipPropertyFixedAsset::where('slip_id', $id)->first();
                break;

            case '9':
            case '10':
                $slip_type = SlipVehicle::where('slip_id', $id)->first();
                break;
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                $slip_type = SlipTechnicalBranch::where('slip_id', $id)->first();
                break;
            case '18':
            case '19':
            case '20':
                $slip_type = SlipEnergy::where('slip_id', $id)->first();
                break;

            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('slip_id', $id)->first();
                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('slip_id', $id)->first();
                break;

            case '24':
            case '25':
            case '26':
                $slip_type = SlipMaritimeThree::where('slip_id', $id)->first();
                break;

            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                $slip_type = SlipMaritimeFour::where('slip_id', $id)->first();
                break;

            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('slip_id', $id)->first();
                break;

            case '34':
                $slip_type = SlipAviationTwo::where('slip_id', $id)->first();
                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('slip_id', $id)->first();
                break;

            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':
                $slip_type = SlipCivilLiability::where('slip_id', $id)->first();
                break;

            case '44':
            case '45':
                $slip_type = SlipFinancialRisk::where('slip_id', $id)->first();
                break;

            case '46':
                $slip_type = SlipFianzaOne::where('slip_id', $id)->first();
                break;

            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                $slip_type = SlipFianzaTwo::where('slip_id', $id)->first();
                break;

            default:
                return 'other';
                break;
        }
        return $slip_type;
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
            case "accidentRate":
                $file_info['name'] = "Siniestralidad";
                break;

            case "quote_form_file":
                $file_info['name'] = "Siniestralidad";
                break;
            case "inspection_control_file":
                $file_info['name'] = "Siniestralidad";
                break;
            case "machine_list_file":
                $file_info['name'] = "Siniestralidad";
                break;
            case "devices_list_file":
                $file_info['name'] = "Siniestralidad";
                break;
            case "desglose_file":
                $file_info['name'] = "Siniestralidad";
                break;
            case "informe":
                $file_info['name'] = "Siniestralidad";
                break;
            case "coverageDetail":
                $file_info['name'] = "Siniestralidad";
                break;
            case "schedule":
                $file_info['name'] = "Siniestralidad";
                break;
            case "soilStudy":
                $file_info['name'] = "Siniestralidad";
                break;
            case "quotationForm":
                $file_info['name'] = "Siniestralidad";
                break;
            case "experience":
                $file_info['name'] = "Siniestralidad";
                break;

            case "workMemory":
                $file_info['name'] = "Siniestralidad";
                break;
            case "valueDetail":
                $file_info['name'] = "Siniestralidad";
                break;

            case "petroleumDenValue":
                $file_info['name'] = "Siniestralidad";
                break;

            case "report":
                $file_info['name'] = "Siniestralidad";
                break;

            case "anualIncome":
                $file_info['name'] = "Siniestralidad";
                break;

            case "employees":
                $file_info['name'] = "Siniestralidad";
                break;

            case "vehicles":
                $file_info['name'] = "Siniestralidad";
                break;

            case "payroll":
                $file_info['name'] = "Siniestralidad";
                break;

            case "dailyProduction":
                $file_info['name'] = "Siniestralidad";
                break;
            case "barrelValue":
                $file_info['name'] = "Siniestralidad";
                break
            case "quotationReport":
                $file_info['name'] = "Siniestralidad";
                break;

            case "financialStatements":
                $file_info['name'] = "Siniestralidad";
                break;

                break;

            case "quotationReport":
                $file_info['name'] = "Siniestralidad";
                break;

            case "financialStatements":
                $file_info['name'] = "Siniestralidad";
                break;
           case "modelMakeHours":
                $file_info['name'] = "Siniestralidad";
                break;

            case "otherForms":
                $file_info['name'] = "Siniestralidad";
                break;

            case "crFormSigned":
                $file_info['name'] = "Siniestralidad";
                break;

            case "pilotExperienceFormSigned":
                $file_info['name'] = "Siniestralidad";
                break;

                break;

            case "pilotos":
                $file_info['name'] = "Siniestralidad";
                break;

            case "signedForm":
                $file_info['name'] = "Siniestralidad";
                break;

            case "medicTest":
                $file_info['name'] = "Siniestralidad";
                break;

                break;

            case "crFormSigned":
                $file_info['name'] = "Siniestralidad";
                break;
            case "copiaMatricula":
                $file_info['name'] = "Siniestralidad";
                break;
            case "informeInspeccion":
                $file_info['name'] = "Siniestralidad";
                break;
            case "siniestralidad_armador":
                $file_info['name'] = "Siniestralidad";
                break;
            case "otrasEmbarcaciones":
                $file_info['name'] = "Siniestralidad";
                break;

            case "experienciaArmador":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleMantenimiento":
                $file_info['name'] = "Siniestralidad";
                break;
            case "tripulacionInfo":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleLicencia":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleViajeFile":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleValorReemplazo":
                $file_info['name'] = "Siniestralidad";
                break;
            case "formularioFirmado":
                $file_info['name'] = "Siniestralidad";
                break;
            case "copiaMatricula":
                $file_info['name'] = "Siniestralidad";
                break;
            case "informeInspeccion":
                $file_info['name'] = "Siniestralidad";
                break;
            case "siniestralidad_armador":
                $file_info['name'] = "Siniestralidad";
                break;
            case "otrasEmbarcaciones":
                $file_info['name'] = "Siniestralidad";
                break;
            case "experienciaArmador":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleMantenimiento":
                $file_info['name'] = "Siniestralidad";
                break;
            case "tripulacionInfo":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleLicencia":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleViajeFile":
                $file_info['name'] = "Siniestralidad";
                break;
            case "detalleValorReemplazo":
                $file_info['name'] = "Siniestralidad";
                break;
            case "formularioFirmado":
                $file_info['name'] = "Siniestralidad";
                break;
            case "report":
                $file_info['name'] = "Siniestralidad";
                break;
            case "signedForm":
                $file_info['name'] = "Siniestralidad";
                break;
            case "quotationReport":
                $file_info['name'] = "Siniestralidad";
                break;
            case "financialReport":
                $file_info['name'] = "Siniestralidad";
                break;
            case "sourceDoc":
                $file_info['name'] = "Siniestralidad";
                break;
            default:
                break;
        }
        return $file_info;
    }
    public function getSlipFiles( Slip $slip){

    }
}
