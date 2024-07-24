<?php

namespace App\Http\Controllers;

use App\Models\CajaMovimiento;
use Illuminate\Http\Request;

class CajaMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CajaMovimiento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cajaMovimiento = new CajaMovimiento();
        $cajaMovimiento->motivo = $request->motivo;
        $cajaMovimiento->monto = $request->monto;
        $cajaMovimiento->tipo = $request->tipo;
        $cajaMovimiento->caja_id = $request->caja_id;
        $cajaMovimiento->save();
        return $cajaMovimiento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CajaMovimiento  $cajaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function show(CajaMovimiento $cajaMovimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CajaMovimiento  $cajaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CajaMovimiento $cajaMovimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CajaMovimiento  $cajaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(CajaMovimiento $cajaMovimiento)
    {
        //
    }
}
