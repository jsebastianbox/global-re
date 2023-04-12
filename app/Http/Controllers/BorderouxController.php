<?php

namespace App\Http\Controllers;

use App\Models\Borderoux;
use App\Models\BorderouxesInstallation;
use App\Models\ConfigGlobal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorderouxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $borderoux = Borderoux::with('assignor')->with('borderouxInstallation')->get();
        $user = Auth::user();

        return view('admin.tecnico.cobrokerajes.borderoux')
            ->with('user', $user)->with('borderoux', $borderoux);
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


        try {

            /* $code_establishment = ConfigGlobal::where('key', 'code_establishment')->first();
            $code_emission_point = ConfigGlobal::where('key', 'code_emission_point')->first();
            $invoice_serie = ConfigGlobal::where('key', 'invoice_serie')->first();
            $serie = intval($invoice_serie->value); */

            $user = Auth::user();
            $bx = Borderoux::create($request->all());

            // dd($request);
            for ($i = 0; $i < $request->installation; $i++) {
                //$num = str_pad($serie + $i, 9, "0", STR_PAD_LEFT);
                BorderouxesInstallation::create([
                    'gross_premium' => $request->installation_premium,
                    'taxes' => $request->impuesto_por_instalamento,
                    'net_premium' => $request->prima_neta_por_instalamento,
                    'num_installation' => $i + 1,
                    'num_days' => 0,
                    'date_installation' => $request->from,
                    'commission' => 0,
                    'commission_total' => $bx->commission_total,
                    'is_generate_invoice' => 0,
                    'invoice_number' => $request->invoice_number,
                    'invoice_serie' => $bx->invoice_serie,
                    'invoice_value' => $bx->commission_total / $bx->installation,
                    'applied_value' => 0,
                    'invoice_balance' => $bx->commission_total / $bx->installation,
                    'borderouxes_id' => $bx->id
                ]);
            }

            //$invoice_serie->update(['value' => $serie + $request->installation]);

            return redirect('/admin/tecnico/cobrokerajes/borderoux')
                ->with('user', $user);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borderoux  $borderoux
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = Auth::user();

        $borderoux = Borderoux::find($id);

        return view('admin.tecnico.cobrokerajes.borderoux')
            ->with('user', $user)->with('borderoux', $borderoux);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borderoux  $borderoux
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
     * @param  \App\Models\Borderoux  $borderoux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        try {
            $user = Auth::user();
            $borderoux = Borderoux::find($id);
            $borderoux->update($request->all());
            return view('admin.tecnico.cobrokerajes.borderoux')
                ->with('user', $user)
                ->with('req', $request)
                ->with('msg', 'Actualizado');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borderoux  $borderoux
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Borderoux::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'eliminado');
    }
}
