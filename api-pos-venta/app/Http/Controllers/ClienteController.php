<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::where('estado', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->estado = 0;
        $cliente->save();
        return $cliente;
    }
}
