<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCoverage;
use App\Models\AviacionExtras;
use App\Models\BoatDetailSlip;
use App\Models\ClauseSlip;
use App\Models\Clausulas_selector;
use App\Models\CoberturasSelector;
use App\Models\Compromiso;
use App\Models\Country;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompromisoController extends Controller
{
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
            ->with('slip_type', $slip_type);
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

        // $slip_type = SlipPropertyFixedAsset::where('id', $slip->model_id)
        // ->with('sum_assured')
        // ->with('detail_perdios')
        // ->with('equipment_list')
        // ->first();

        $user = Auth::user();

        return view('admin.comercial.edit_compromiso.edit_index')
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


        return view('admin.comercial.edit_compromiso.edit_index')
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
        

        return view('admin.comercial.edit_compromiso.edit_index')
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
    }
    public function tecnico($id)
    {
        $users = User::all();
        $user = Auth::user();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);

        $sum_assured = SumAssured::where('slip_id', $id);
        $slip_type = SlipTechnicalBranch::where('slip_id', $id)->first();

        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::where('main_branch', 'tecnico')->get();
        $clausulasSelect = Clausulas_selector::where('main_branch', 'tecnico')->get();

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('coberturas', $type_coverage)
            ->with('sum_assured', $sum_assured)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);
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

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);
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


        switch ($slip->type_coverage) {
            case '32':
            case '33':
                $slip_type = SlipAviationOne::where('slip_id', $id)->first();
                $information_aerial = InformationAerialHelmets::where('slip_id', $id)->get();
                $aviation_extras = AviacionExtras::where('slip_id', $id)->get();
                $object_insurance = [];
                break;

            case '34':
                $slip_type = SlipAviationTwo::where('slip_id', $id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $id)->get();
                $information_aerial = [];
                $aviation_extras = [];
                break;

            case '35':
            case '36':
            case '37':
                $slip_type = SlipAviationThree::where('slip_id', $id)->first();
                $information_aerial = [];
                $aviation_extras = [];
                $object_insurance = [];

                break;

            default:
                break;
        }

        $user = Auth::user();

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('information_aerial', $information_aerial)
            ->with('aviation_extras', $aviation_extras)
            ->with('object_insurance', $object_insurance)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);
    }
    public function maritimo($id)
    {
        $users = User::all();
        $countries = Country::all();
        $slip_statuses = SlipStatus::all();
        $type_coverage = TypeCoverage::all();
        $slip = Slip::find($id);
        
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::all();
        $clausulasSelect = Clausulas_selector::all();

        switch ($slip->type_coverage) {
            case '21':
            case '22':
                $slip_type = SlipMaritimeOne::where('slip_id', $id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $id)->get();
                break;

            case '23':
                $slip_type = SlipMaritimeTwo::where('slip_id', $id)->first();
                $boat_detail = BoatDetailSlip::where('slip_id', $id)->get();
                break;

            case '24':
            case '25':
            case '26':        
                $slip_type = SlipMaritimeThree::where('slip_id', $id)->first();
                $boat_detail = [];
            case '27':
            case '28':
            case '29':
            case '30':
                $slip_type = SlipMaritimeFour::where('slip_id', $id)->first();
                $boat_detail = [];
                break;

            default:
                break;
        }

        $user = Auth::user();

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('boat_detail', $boat_detail)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);
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
        
        //clausulas y cobertura to find
        $coberturasSelect = CoberturasSelector::all();
        $clausulasSelect = Clausulas_selector::all();

        return view('admin.comercial.edit_compromiso.edit_index')
            ->with('user', $user)
            ->with('users', $users)
            ->with('countries', $countries)
            ->with('slip_statuses', $slip_statuses)
            ->with('type_coverage', $type_coverage)
            ->with('coberturasSelect', $coberturasSelect)
            ->with('clausulasSelect', $clausulasSelect)
            ->with('slip', $slip)
            ->with('slip_type', $slip_type);
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

        switch ($slip->type_coverage) {
            case '46':
                $slip_type = SlipFianzaOne::where('slip_id', $id)->first();
                $object_insurance = ObjectInsurance::where('slip_id', $id)->get();
                break;

                case '47':
                case '48':
                case '49':
                case '50':
                case '51':
                case '52':
                $slip_type = SlipFianzaTwo::where('slip_id', $id)->first();
                $object_insurance = [];
                break;
            default:
                break;
        }


        return view('admin.comercial.edit_compromiso.edit_index')
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
    }
}
