<?php

namespace App\Http\Controllers;

use App\Models\tbl_cuentas;
use App\Models\tbl_tipo;
use App\Models\tbl_perfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    //
<<<<<<< Updated upstream
=======
    public function index()
    {
        // Obtener el usuario que inició sesión
        $usuario = Auth::user();
        
        // Obtener las cuentas del usuario actual
        $cuentas = tbl_cuentas::where('users_id', $usuario->id)->get();

        // foreach ($cuentas as $cuenta) {
        //     $numPerfilesOcupados = tbl_perfiles::where('tbl_cuentas_cue_id', $cuenta->cue_id)
        //         ->where('tbl_estado_perfil_est_id', '!=', 1) // Considerar solo perfiles no disponibles
        //         ->count();
        //     $cuenta->numPerfilesOcupados = $numPerfilesOcupados;
        // }
        foreach ($cuentas as $cuenta) {
            // Obtener perfiles ocupados
            $per_desocupados = tbl_perfiles::where('tbl_cuentas_cue_id', $cuenta->cue_id)
                ->where('tbl_estado_perfil_est_id', 1) // Considerar solo perfiles ocupados
                ->get(); // Obtener la colección de perfiles ocupados
            $cuenta->per_desocupados = $per_desocupados;
        
            // Obtener perfiles desocupados
            $per_ocupados = tbl_perfiles::where('tbl_cuentas_cue_id', $cuenta->cue_id)
                ->where('tbl_estado_perfil_est_id', 2) // Considerar solo perfiles desocupados
                ->get(); // Obtener la colección de perfiles desocupados
            $cuenta->per_ocupados = $per_ocupados;
        }
        
    

    //     $tipo = DB::table('tbl_cuentas')
    // ->join('tbl_tipo', 'tbl_cuentas.tbl_tipo_tipo_id', '=', 'tbl_tipo.tipo_id')
    // ->join('tbl_perfiles', 'tbl_cuentas.cue_id', '=', 'tbl_perfiles.tbl_cuentas_cue_id')
    // ->select('tbl_cuentas.*', 'tbl_tipo.*', 'tbl_perfiles.*')
    // ->get();

        // Retornar la vista con las cuentas del usuario
        return view('cuentas.cuentas', ['cuentas' => $cuentas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuentas = tbl_cuentas::all();
        $tipo = tbl_tipo::all();
        return view('cuentas.crearCuentas', ['cuentas' => $cuentas , 'tipos'=>$tipo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cue_correo' => ['required'],
            'cue_contra' => ['required'],
            'cue_fecha_compra' => ['required'],
            'cue_dias' => ['required'],
            'cue_fecha_vence' => ['required'],
            'cue_proveedor' => ['required'],
            'tbl_tipo_tipo_id' => ['required'],
            'users_id' => ['required']

        ]);

        tbl_cuentas::create($request->all());

        // Obtener el ID de la última cuenta creada y el tbl_tipo_tipo_id asociado
        $ultimaCuenta = tbl_cuentas::latest()->first(['cue_id', 'tbl_tipo_tipo_id']);

        // Acceder al ID de la cuenta y al tbl_tipo_tipo_id asociado
        $ultimaCuentaId = $ultimaCuenta->cue_id;
        $tipoIdAsociado = $ultimaCuenta->tbl_tipo_tipo_id;

        
        $tipos = tbl_tipo::find($tipoIdAsociado);

        for ($i = 0; $i < $tipos->tipo_num_perfil; $i++) {
            tbl_perfiles::create([
                'per_num' => $i+1,
                'tbl_estado_perfil_est_id' => 1,
                'tbl_cuentas_cue_id' => $ultimaCuentaId,            
                // Agregar otros campos de perfil si es necesario
            ]);
        }

        return redirect()->route('cuentas.index');
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
        $cuentas = tbl_cuentas::find($id);
        $tipo = tbl_tipo::all();
        return view('cuentas.editarCuenta', ['cuentas'=>$cuentas,'tipos'=>$tipo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cue_correo' => ['required'],
            'cue_contra' => ['required'],
            'cue_fecha_compra'=>['required'],
            'cue_fecha_vence'=>['required'],
            'cue_proveedor'=>['required']
        ]);
    
        $cuenta = tbl_cuentas::find($id);
        
        $cuenta->update($request->all());
        return redirect()->route('cuentas.index');
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
>>>>>>> Stashed changes
}
