<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
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
        // $ambiente = tblAmbiente::find($id);
        // $tipoAmbiente = TblTipoAmbiente::all();
        // $estadoAmbiente = TblEstadoAmbiente::all();
        // return view('ambientes.editarAmbiente', ['ambiente'=>$ambiente, 'tipoAmbiente'=>$tipoAmbiente, 'estadoAmbiente'=>$estadoAmbiente]);
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
