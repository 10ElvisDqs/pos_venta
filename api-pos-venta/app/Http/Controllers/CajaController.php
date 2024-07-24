<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $model = Caja::orderBy('id','desc')->get();
      $list = [];
      foreach($model as $m){

     
        $list[] = $this->show($m);
      }
      return $list;
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
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show(Caja $caja)
    {
        $caja->ventas = $caja->CajaVentas()->get()->sum('monto');
        $caja->compras = $caja->CajaCompras()->get()->sum('monto');
        $caja->movimientos = $caja->CajaMovimientos()->get();
        $caja->ingresos =  $caja->movimientos->where('tipo',1)->sum('monto');
        $caja->salidas =  $caja->movimientos->where('tipo',2)->sum('monto');
        $caja->total = floatval($caja->ingresos + $caja->ventas  - $caja->salidas-$caja->compras);
        $caja->user = $caja->User;
        $caja->fecha = $caja->created_at->format('Y-m-d');
        return $caja;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caja $caja)
    {
        $caja->estado = 0;
        $caja->save();
        $newCaja = new Caja();
        $newCaja->user_id=$caja->user_id;
        $newCaja->estado=1;
        $newCaja->save();
        return $newCaja;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caja $caja)
    {
        //
    }
}
