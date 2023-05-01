<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCoverage;
use App\Models\AviacionExtras;
use App\Models\BoatDetailSlip;
use App\Models\ClauseSlip;
use App\Models\Clausulas_selector;
use App\Models\CoberturasPilotos;
use App\Models\CoberturasSelector;
use App\Models\Compromiso;
use App\Models\Country;
use App\Models\DeductibleSlip;
use App\Models\DetailPerdios;
use App\Models\InformationAerialHelmets;
use App\Models\ObjectInsurance;
use App\Models\Slip;
use App\Models\SlipAviationOne;
use App\Models\SlipAviationTwo;
use App\Models\SlipAviationThree;
use App\Models\SlipCivilLiability;
use App\Models\SlipEnergy;
use App\Models\SlipFianzaOne;
use App\Models\SlipFianzaTwo;
use App\Models\SlipFinancialRisk;
use App\Models\SlipLifePersonlAccident;
use App\Models\SlipMaritimeOne;
use App\Models\SlipMaritimeTwo;
use App\Models\SlipMaritimeThree;
use App\Models\SlipMaritimeFour;
use App\Models\SlipPropertyFixedAsset;
use App\Models\SlipTechnicalBranch;
use App\Models\SlipVehicle;
use App\Models\SlipStatus;
use App\Models\SlipType;
use App\Models\SumAssured;
use App\Models\TypeCoverage;
use App\Models\TransportSlipStock;
use App\Models\User;
use App\Models\VehicleDetail;
use App\Traits\HasUploadFiles;
use App\Traits\HasSlipsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompromisoController extends Controller
{
    use HasUploadFiles;
    use HasSlipsType;

    public function compromiso()
    {
        $slips = Slip::all();
        $user = Auth::user();
        $users = User::all();
        $countries = Country::all()->pluck('name', 'id')->toArray();
        $type_coverage = TypeCoverage::all()->pluck('name', 'id')->toArray();
        $slip_statuses = SlipStatus::all()->pluck('slip_status', 'id')->toArray();

        return view('admin.comercial.compromiso')
            ->with('user', $user)
            ->with('users', $users)
            ->with('slips', $slips)
            ->with('countries', $countries)
            ->with('type_coverage', $type_coverage)
            ->with('slip_statuses', $slip_statuses);
    }

    public function compromiso_list()
    {
        $user = Auth::user();
        $slips = Slip::all();
        $countries = Country::all();
        $type_coverage = TypeCoverage::all();
        $compromisos = Slip::all();
        $slip_statuses = SlipStatus::all();

        return view('admin.comercial.compromisos')
            ->with('user', $user)
            ->with('slips', $slips)
            ->with('slip_statuses', $slip_statuses)
            ->with('country', $countries)
            ->with('compromisos', json_encode($compromisos))
            ->with('coverage', $type_coverage);
    }

    public function newCompromiso(Request $request)
    {
        $compromiso = new Compromiso();
        $compromiso->date = $request->input('date');
        $compromiso->insured = $request->input('insured');
        $compromiso->branch = $request->input('branch');
        $compromiso->step = 1;
        $compromiso->save();

        return redirect()->back();
    }

    public function getCompromisos()
    {
        $slips = Slip::orderBy('updated_at', 'desc')->where('slip_status_id', '2')->get();
        $user = Auth::user();
        $slip = Slip::all();
        $countries = Country::all();
        $type_coverage = TypeCoverage::all();
        $users = User::all();
        $slip_statuses = SlipStatus::all();

        return view('admin.comercial.edit_compromiso.index_view')
            ->with('slips', json_encode(
                $slips->map(function ($slips) {
                    return array_merge($slips->toArray(), ['id' => $slips->model_id]);
                }),
            ))
            ->with('slip', $slip)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('user', $user);
    }

    public function getCompromisosList()
    {
        $slips = Slip::with('country', 'type_coverage', 'user', 'slip_status')->orderBy('updated_at', 'asc')->get();
        return json_encode($slips);
    }

    public function destroy($id)
    {

        $slip = Slip::find($id);
        
        if(!$slip){
            return redirect()->route('/');
        }
        
        switch ($slip->type_coverage) {
            case '1':
            case '2':
            case '3':
            case '4':
                SlipLifePersonlAccident::where('slip_id', $id)->delete();
                ObjectInsurance::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;
            case '5':
            case '6':
            case '7':
            case '8':
                SlipPropertyFixedAsset::where('slip_id', $id)->delete();
                SumAssured::where('slip_id', $id)->delete();
                DetailPerdios::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '9':
            case '10':
                SlipVehicle::where('slip_id', $id)->delete();
                VehicleDetail::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;
            case '11':
            case '12':
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
                SlipTechnicalBranch::where('slip_id', $id)->delete();
                SumAssured::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;
            case '18':
            case '19':
            case '20':
                SlipEnergy::where('slip_id', $id)->delete();
                SumAssured::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '21':
            case '22':
                SlipMaritimeOne::where('slip_id', $id)->delete();
                BoatDetailSlip::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '23':
                SlipMaritimeTwo::where('slip_id', $id)->delete();
                BoatDetailSlip::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '24':
            case '25':
            case '26':
                SlipMaritimeThree::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                SlipMaritimeFour::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '32':
            case '33':
                SlipAviationOne::where('slip_id', $id)->delete();
                InformationAerialHelmets::where('slip_id', $id)->delete();
                AviacionExtras::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;
            case '34':
                SlipAviationTwo::where('slip_id', $id)->delete();
                ObjectInsurance::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '35':
            case '36':
            case '37':
                SlipAviationThree::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();
                break;

            case '38':
            case '39':
            case '40':
            case '41':
            case '42':
            case '43':
                SlipCivilLiability::where('slip_id', $id)->delete();
                AdditionalCoverage::where('slip_id', $id)->delete();
                ClauseSlip::where('slip_id', $id)->delete();
                DeductibleSlip::where('slip_id', $id)->delete();

                break;

            case '44':
            case '45':
                SlipFinancialRisk::where('slip_id', $id)->first();
                AdditionalCoverage::where('slip_id', $id)->first();
                ClauseSlip::where('slip_id', $id)->first();
                DeductibleSlip::where('slip_id', $id)->first();
                break;

            case '46':
                SlipFianzaOne::where('slip_id', $id)->first();
                ObjectInsurance::where('slip_id', $id)->first();
                AdditionalCoverage::where('slip_id', $id)->first();
                ClauseSlip::where('slip_id', $id)->first();
                DeductibleSlip::where('slip_id', $id)->first();
                break;

            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                SlipFianzaTwo::where('slip_id', $id)->first();
                AdditionalCoverage::where('slip_id', $id)->first();
                ClauseSlip::where('slip_id', $id)->first();
                DeductibleSlip::where('slip_id', $id)->first();
                break;

            default:
                break;
        }
        
        $arr = $this->getSlipType($slip);
        
        $slip_type = $arr[0];
        $case = $arr[1];
        $case = $case == "activos_fijos" ? "activos-fijos" : $case;
        $path = "app/slips/". $case ."/" . $id. "/";
        
        // Elinina archivos del directorio
        $this->removeDir($path . "*.*");

        // Elimina el directorio
        $this->removeDirectory($path);
        
        ObjectInsurance::where('slip_id', $id)->delete();
        $slip->delete($id);
        
        return redirect('/admin/compromiso/pending');
    }

    public function editCompromiso($id)
    {

        $slip = Slip::where('id', $id)->with('type')->with('security')->with('guarantee_payment')
            ->with('deductible')->with('coverage')->with('clause_aditional')->with('coverage_additional')
            ->with('country_politics_one')->with('excluye')->with('limit_insured')
            ->with('limit_coverage')->with('user')->with('country')->first();
        $slipType = $slip->slipType->slippable;

        $user = Auth::user();

        return view('admin.tecnico.slip.slipSelected')
            ->with('user', $user)
            ->with('slip', $slip)
            ->with('slip_type', $slipType);
    }

    //Redirect to edit views
    public function vida($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();

        $slip = Slip::find($id);

        $slip_type = SlipLifePersonlAccident::where('slip_id', $id)->first();


        $object_insurance = ObjectInsurance::where('slip_id', $slip->id)->get();

        $user = Auth::user();
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'vida')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'vida')->get();

        $accidentRateFile = $this->getFile("slips/vida/" . $slip_type->id . "/accidentRate.*");
        $accidentRate = null;
        $accidentRateExtension = null;

        if ($accidentRateFile) {
            $accidentRateExtension = $this->getExtensionFromName($accidentRateFile);
            $accidentRate = $this->getBase64FromFile($accidentRateFile);
        }

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('slip', $slip)
            ->with('object_insurance', $object_insurance)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip_type', $slip_type)
            ->with('accidentRate', $accidentRate)
            ->with('accidentRateExtension', $accidentRateExtension);
    }

    public function activos($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();

        $slip = Slip::find($id);

        $sum_assured = SumAssured::where('slip_id', $slip->id)->get();
        $predios = DetailPerdios::where('slip_id', $slip->id)->get();

        $slip_type = SlipPropertyFixedAsset::where('slip_id', $id)->first();

        $clausulas = ClauseSlip::where('slip_id', $slip->id)->get();
        $coberturas = AdditionalCoverage::where('slip_id', $slip->id)->get();
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'activos')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'activos')->get();
        $slip_route = "activos-fijos";
        $user = Auth::user();

        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('slip', $slip)
            ->with('clausulas', $clausulas)
            ->with('coberturas', $coberturas)
            ->with('slip_type', $slip_type)
            ->with('predios', $predios)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('sum_assured', $sum_assured);

        $view = $this->chargeFilesIntoView($slip_route, "activos_fijos", $slip_type->id, $view,);

        return $view;
    }

    public function vehiculos($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();

        $slip = Slip::find($id);

        $user = Auth::user();
        $slip_type = SlipVehicle::where('slip_id', $id)->first();

        $vehicles_details = VehicleDetail::where('slip_id', $id)->get();


        $clausulas = ClauseSlip::where('slip_id', $slip->id)->get();
        $coberturas = AdditionalCoverage::where('slip_id', $slip->id)->get();
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'tecnico')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'tecnico')->get();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('clausulas', $clausulas)
            ->with('coberturas', $coberturas)
            ->with('slip', $slip)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('vehicles_details', $vehicles_details)
            ->with('slip_type', $slip_type);


        $view = $this->chargeFilesIntoView("vehiculos", "vehiculos", $slip_type->id, $view);

        return  $view;
    }

    public function energia($id)
    {
        $users = User::all();
        $user = Auth::user();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        $slip_type = SlipEnergy::where('slip_id', $id)->first();

        $sum_assured = SumAssured::where('slip_id', $id)->get();

        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'energia')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'energia')->get();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('sum_assured', $sum_assured)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);

        $view = $this->chargeFilesIntoView("energia", "energia", $slip_type->id, $view);

        return $view;
    }
    public function tecnico($id)
    {
        $users = User::all();
        $user = Auth::user();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        $slip_type = SlipTechnicalBranch::where('slip_id', $id)->first();
        $sum_assured = SumAssured::where('slip_id', $id)->get();

        $alopQuote  = null;
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'tecnico')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'tecnico')->get();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('coberturas', $type_coverage)
            ->with('sum_assured', $sum_assured)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('alopQuote', $alopQuote)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);

        $view = $this->chargeFilesIntoView("tecnico", "tecnico", $slip_type->id, $view);
        return $view;
    }
    public function responsabilidad($id)
    {
        $users = User::all();
        $user = Auth::user();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();

        $slip = Slip::find($id);

        $slip_type = SlipCivilLiability::where('slip_id', $id)->first();

        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'responsabilidad_civil')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'responsabilidad_civil')->get();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);

        $view = $this->chargeFilesIntoView("responsabilidad", "responsabilidad", $slip_type->id, $view);

        return $view;
    }
    public function aviacion($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);


        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'aviacion')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'aviacion')->get();
        $user = Auth::user();

        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip);


        switch ($slip->type_coverage) {
            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('slip_id', $id)->first();
                $information_aerial = InformationAerialHelmets::where('slip_id', $id)->get();
                $aviation_extras = AviacionExtras::where('slip_id', $id)->get();
                $object_insurance = [];
                $view = $this->chargeFilesIntoView("aviacion_1", "aviacion_1", $slip_type->id, $view);
                break;

            case '34':
                $slip_type = SlipAviationTwo::where('slip_id', $id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $id)->get();
                $coverages_pilots = CoberturasPilotos::where('slip_id', $id)->get();
                $count = count($coverages_pilots);
                $information_aerial = [];
                $aviation_extras = [];
                $view = $this->chargeFilesIntoView("aviacion_2", "aviacion_2", $slip_type->id, $view);
                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('slip_id', $id)->first();
                $information_aerial = InformationAerialHelmets::where('slip_id', $id)->get();
                $aviation_extras = [];
                $object_insurance = [];

                $view = $this->chargeFilesIntoView("aviacion_3", "aviacion_3", $slip_type->id, $view);
                break;

            default:
                break;
        }

        $view->with('slip_type', $slip_type)
            ->with('information_aerial', $information_aerial)
            ->with('aviation_extras', $aviation_extras)
            ->with('coverages_pilots', $coverages_pilots)
            ->with('count', $count)
            ->with('object_insurance', $object_insurance);

        return    $view;
    }
    public function maritimo($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        $user = Auth::user();
        $siniestralidadCincoAnios = null;
        $detalleViaje = null;
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::all();
        $clausulasSelect = Clausulas_selector::all();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('detalleViaje', $detalleViaje)
            ->with('siniestralidadCincoAnios', $siniestralidadCincoAnios)
            ->with('slip', $slip);

        switch ($slip->type_coverage) {
            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('slip_id', $id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $id)->get();
                $view = $this->chargeFilesIntoView("maritimo_1", "maritimo_1", $slip_type->id, $view);
                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('slip_id', $id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $id)->get();
                $view = $this->chargeFilesIntoView("maritimo_2", "maritimo_2", $slip_type->id, $view);
                break;

            case '24':
            case '25':
            case '26':
                $slip_type = SlipMaritimeThree::where('slip_id', $id)->first();
                $view = $this->chargeFilesIntoView("maritimo_3", "maritimo_3", $slip_type->id, $view);
                $boat_detail = [];

                break;
            case '27':
            case '28':
            case '29':
            case '30':
            case '31':
                $slip_type = SlipMaritimeFour::where('slip_id', $id)->first();
                $view = $this->chargeFilesIntoView("maritimo_4", "maritimo_4", $slip_type->id, $view);
                $boat_detail = [];
                break;

            default:
                break;
        }

        $view->with('boat_detail', $boat_detail)
            ->with('slip_type', $slip_type);

        return $view;
    }
    public function riesgos($id)
    {
        $user = Auth::user();
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        $slip_type = SlipFinancialRisk::where('slip_id', $id)->first();

        $object_insurance = ObjectInsurance::where('slip_id', $id)->get();
        if (count($object_insurance) === 0) {
            $object_insurance = [];
        }
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::all();
        $clausulasSelect = Clausulas_selector::all();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('object_insurance', $object_insurance)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);


        $view = $this->chargeFilesIntoView("riesgo", "riesgo", $slip_type->id, $view);
        return    $view;
    }
    public function fianzas($id)
    {
        $users = User::all();
        $user = Auth::user();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'fianzas')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'fianzas')->get();
        $view = view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip);
        switch ($slip->type_coverage) {
            case 'null':
                $slip_type = SlipFianzaOne::where('slip_id', $id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $id)->get();
                $view = $this->chargeFilesIntoView("finanzas_1", "finanzas_1", $slip_type->id, $view);
                break;
                
            case '46':
            case '47':
            case '48':
            case '49':
            case '50':
            case '51':
            case '52':
                $slip_type = SlipFianzaTwo::where('slip_id', $id)->first();
                $object_insurance = [];
                $view = $this->chargeFilesIntoView("finanzas_2", "finanzas_2", $slip_type->id, $view);
                break;
            default:
                break;
        }
        $view->with('object_insurance', $object_insurance)
            ->with('slip_type', $slip_type);

        return $view;
    }
}
