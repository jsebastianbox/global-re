<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Compromiso;
use App\Models\Slip;
use Illuminate\Http\Request;

class CompromisoController extends Controller
{
    public function compromiso()
    {
        $compromisos = Compromiso::all();
        return $compromisos;
    }

    public function index()
    {
        $slips = Slip::all();
        // $countries = Country::all();
        // $type_coverage = TypeCoverage::all();
        // $slip_statuses = SlipStatus::all();

        // dd($slip_statuses->find($slips[0]->slip_status_id)->slip_status);

        return response()->json($slips);
    }
}
