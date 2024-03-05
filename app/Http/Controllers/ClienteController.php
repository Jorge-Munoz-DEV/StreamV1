<?php

namespace App\Http\Controllers;

use App\Models\tbl_clientes;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
            $clientes = tbl_clientes::all();
            return view('clientes.clientes', ['cliente' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = tbl_clientes::all();
       
        return view('clientes.crearCliente', ['cliente' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cli_nombre' => ['required'],
            'cli_apellido' => ['required'],
            'cli_telefono' => ['required'],
            'cli_correo' => ['required'],
            'cli_notas' => ['required']
        ]);

        tbl_clientes::create($request->all());

        return redirect()->route('clientes.index');
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
        $clientes = tbl_clientes::find($id);
        return view('clientes.editarCliente', ['cliente'=>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cli_nombre' => ['required'],
            'cli_apellido' => ['required'],
            'cli_telefono' => ['required'],
            'cli_correo' => ['required'],
            'cli_notas' => ['required']
        ]);

        $cliente = tbl_clientes::find($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes= tbl_clientes::find($id);
        $clientes->delete();

        return redirect()->back();
    }
}
