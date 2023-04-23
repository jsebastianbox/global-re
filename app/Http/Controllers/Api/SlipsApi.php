<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slip;
use App\Traits\HasSlipsType;
use App\Traits\HasUploadFiles;
use Illuminate\Http\Request;
use PDF;

class SlipsApi extends Controller
{
    use HasSlipsType, HasUploadFiles;
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
        [$slip_type, $case] = $this->getSlipType($slip);
        $files = $this->getFilesListed($case, $slip_type->id);
        return $files;
    }
    public function slipPDF(Request $request, $id)
    {
        $slip = Slip::find($id);
        [$slip_type, $case] = $this->getSlipType($slip);
        $pdf = PDF::loadView('admin.tecnico.slip.pdfVista', [
            'slip_date' => $slip_type,
        ]);

        return $pdf->download('reporte_slip.pdf');
    }
}
