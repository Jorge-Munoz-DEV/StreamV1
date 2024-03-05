<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PerfilesController extends Controller
{
    //
    public function index()
    {
            // $clientes = tbl_clientes::all();
            // return view('clientes.clientes', ['cliente' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $clientes = tbl_clientes::all();
       
        // return view('clientes.crearCliente', ['cliente' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'cli_nombre' => ['required'],
        //     'cli_apellido' => ['required'],
        //     'cli_telefono' => ['required'],
        //     'cli_correo' => ['required'],
        //     'cli_notas' => ['required']
        // ]);

        // tbl_clientes::create($request->all());

        // return redirect()->route('clientess.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ventas = DB::table('tbl_perfiles')
        ->join('tbl_cuentas', 'tbl_perfiles.tbl_cuentas_cue_id', '=', 'tbl_cuentas.cue_id')
        ->join('tbl_ventas', 'tbl_ventas.tbl_perfiles_per_id', '=', 'tbl_perfiles.per_id')
        ->join('tbl_clientes', 'tbl_ventas.tbl_Clientes_cli_id', '=', 'tbl_clientes.cli_id')
        ->select('tbl_ventas.*', 'tbl_clientes.*','tbl_perfiles.*', 'tbl_cuentas.*')
        ->where('tbl_perfiles.tbl_cuentas_cue_id', '=', $id)
        ->get();

        // dd($ventas);
        
        $hoy = Carbon::now()->startOfDay();
        $ventas->each(function($venta) use ($hoy){
            $mensaje = null;
            $color = null;
            
            $fechaFinal = Carbon::parse($venta->ven_fecha_vence)->startOfDay();
            
            $diasRestantes = $hoy->diffInDays($fechaFinal, true);

            $hoyTimestamp = $hoy->timestamp;
            $fechaFinalTimestamp = $fechaFinal->timestamp;
            $prueba = $fechaFinalTimestamp - $hoyTimestamp;

            
            if ( $prueba == 0||$prueba > -86400) {
                if ($diasRestantes >= 10) {
                    $mensaje = $diasRestantes;
                    $color = 'text-success'; // Verde
                } elseif ($diasRestantes >= 1) {
                    $mensaje = $diasRestantes;
                    $color = 'text-warning'; // Amarillo
                }
                
            }elseif ($prueba <= -86400) {
                if ($diasRestantes-1 == 1){
                    $mensaje = "Vencida (".$diasRestantes . " día)" ;
                }else{
                    $mensaje = "Vencida (".$diasRestantes . " días)" ;
                }
                $color = 'text-danger'; // Rojo           
            }else {
                $mensaje = "vence hoy";
                $color = 'text-danger'; // Rojo 
            }
                                    
            $venta->diasRestantes = $diasRestantes;
            $venta->vencimiento = $mensaje;
            // $cuenta->prueba = $prueba;
            $venta->colorVencimiento = $color;
        } );

        return view('ventas.ventaPerfiles', ['ventas'=>$ventas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [
        //     'amb_Denominacion' => ['required'],
        //     'amb_Cupo' => ['required','numeric','min:1', 'max:254', ],
        //     'Codigo_tipo' => ['required'],
        //     'Codigo_estado'=>['required']
        // ]);

        // $ambiente = tblAmbiente::find($id);
        // $ambiente->update($request->all());

        // return redirect()->route('ambientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ambiente= tblAmbiente::find($id);
        // $ambiente->delete();

        // return redirect()->back();
    }
}
