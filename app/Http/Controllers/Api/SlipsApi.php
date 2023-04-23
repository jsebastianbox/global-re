<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;

class SlipsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slips = Slip::whereHas('slipStatus', function ($query) {
            $query->where('slip_status_id', 2);
        })->get();

        return response()->json(['data' => $slips]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slip $slip)
    {
        return response()->json(['data' => $slip]);
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
    public function slipFiles(Request $request, $id)
    {
        $slip = Slip::find($id);
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
        return [
            [
                'name' => 'Machine list',
                'file' => 'base64',
                'extension' => 'file extension',
            ],
            [
                'name' => 'Machine list',
                'file' => 'base64',
                'extension' => 'file extension',
            ],
            [
                'name' => 'Machine list',
                'file' => 'base64',
                'extension' => 'file extension',
            ],
        ];
    }
}
