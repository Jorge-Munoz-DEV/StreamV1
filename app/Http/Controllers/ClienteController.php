<?php

namespace App\Http\Controllers;

use App\Models\tbl_clientes;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
            $clientes = tbl_clientes::all();
            return view('clientes.cliente', ['cliente' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoAmbiente = TblTipoAmbiente::all();
        $estadoAmbiente = TblEstadoAmbiente::all();
        return view('ambientes.crearAmbientes', ['tipoAmbiente' => $tipoAmbiente, 'estadoAmbiente' => $estadoAmbiente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amb_Denominacion' => ['required'],
            'amb_Cupo' => ['required','numeric','min:1', 'max:254', ],
            'Codigo_tipo' => ['required'],
            'Codigo_estado'=>['required']
        ]);

        tblAmbiente::create($request->all());

        return redirect()->route('ambientes.index');
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
        $ambiente = tblAmbiente::find($id);
        $tipoAmbiente = TblTipoAmbiente::all();
        $estadoAmbiente = TblEstadoAmbiente::all();
        return view('ambientes.editarAmbiente', ['ambiente'=>$ambiente, 'tipoAmbiente'=>$tipoAmbiente, 'estadoAmbiente'=>$estadoAmbiente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'amb_Denominacion' => ['required'],
            'amb_Cupo' => ['required','numeric','min:1', 'max:254', ],
            'Codigo_tipo' => ['required'],
            'Codigo_estado'=>['required']
        ]);

        $ambiente = tblAmbiente::find($id);
        $ambiente->update($request->all());

        return redirect()->route('ambientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ambiente= tblAmbiente::find($id);
        $ambiente->delete();

        return redirect()->back();
    }
}
