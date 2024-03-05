<?php

namespace App\Http\Controllers;

use App\Models\tbl_clientes;
use App\Models\tbl_perfiles;
use App\Models\tbl_ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VentaController extends Controller
{
    //
    public function index()
    {   
        $ventas = tbl_ventas::all();

        $ventas = DB::table('tbl_ventas')
        ->join('tbl_perfiles', 'tbl_ventas.tbl_perfiles_per_id', '=', 'tbl_perfiles.per_id')
        ->join('tbl_clientes', 'tbl_ventas.tbl_Clientes_cli_id', '=', 'tbl_clientes.cli_id')
        ->join('tbl_cuentas', 'tbl_perfiles.tbl_cuentas_cue_id', '=', 'tbl_cuentas.cue_id')
        ->select('tbl_ventas.*', 'tbl_clientes.*','tbl_perfiles.*', 'tbl_cuentas.*')
        ->get();

       

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

        return view('ventas.ventas', ['ventas' => $ventas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    

    public function estado(Request $request)
    {
        tbl_perfiles::where('per_id', $request->tbl_perfiles_per_id)->update(['tbl_estado_perfil_est_id' => 2]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ven_nombre_perfil' => ['required'],
            'ven_fecha_compra' => ['required'],
            'ven_fecha_vence' => ['required'],
            'ven_precio' => ['required'],
            'ven_pin' => ['required'],
            'ven_notas' => ['required'],
            'tbl_perfiles_per_id' => ['required'],
            'tbl_Clientes_cli_id' => ['required'],
        ]);

        $venta = tbl_ventas::create($request->all());

        // Llama a la función estado
        $this->estado($request);

        // dd($crear);
        return redirect()->route('cuentas.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $clientes = tbl_clientes::all();
        // $perfiles = tbl_perfiles::find($id);
        // $ventas = tbl_ventas::all();
        // return view('ventas.crearVentas', ['venta' => $ventas, 'clientes' => $clientes, 'perfiles' => $perfiles]);
    }

    // Agrega la función 'perfiles' para manejar la redirección
    public function perfiles(string $id)
    {
        $clientes = tbl_clientes::all();
        $perfiles = tbl_perfiles::find($id);
        $ventas = tbl_ventas::all();
        return view('ventas.crearVentas', ['venta' => $ventas, 'clientes' => $clientes, 'perfiles' => $perfiles]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = tbl_clientes::all();
        $ventas = DB::table('tbl_ventas')
        ->join('tbl_perfiles', 'tbl_ventas.tbl_perfiles_per_id', '=', 'tbl_perfiles.per_id')
        ->join('tbl_clientes', 'tbl_ventas.tbl_Clientes_cli_id', '=', 'tbl_clientes.cli_id')
        ->join('tbl_cuentas', 'tbl_perfiles.tbl_cuentas_cue_id', '=', 'tbl_cuentas.cue_id')
        ->select('tbl_ventas.*', 'tbl_clientes.*', 'tbl_perfiles.*', 'tbl_cuentas.*')
        ->where('tbl_ventas.idtbl_ventas', '=', $id)
        ->first(); 

        // dd($ventas);

        return view('ventas.editarVenta', ['ventas'=>$ventas, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        

        $this->validate($request, [
            'ven_nombre_perfil' => ['required'],
            'ven_fecha_compra' => ['required'],
            'ven_fecha_vence' => ['required'],
            'ven_precio' => ['required'],
            'ven_pin' => ['required'],
            'ven_notas' => ['required'],
            'tbl_perfiles_per_id' => ['required'],
            'tbl_Clientes_cli_id' => ['required'],
        ]);
    
        $ventas = tbl_ventas::find($id);            
        $ventas->update($request->all());

        $ventas = DB::table('tbl_ventas')
        ->join('tbl_perfiles', 'tbl_ventas.tbl_perfiles_per_id', '=', 'tbl_perfiles.per_id')                
        ->select('tbl_perfiles.tbl_cuentas_cue_id')
        ->where('tbl_ventas.idtbl_ventas', '=', $id)
        ->first(); // Agrega este método para obtener el primer resultado de la consulta


        return redirect()->route('perfiles.edit', $ventas->tbl_cuentas_cue_id);        

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
