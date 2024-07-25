<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=  Articulo::where('estado',1)->get();
        $list = [];
        foreach($model as $m){
            $list[] = $this->kardex($m);
        }
        return $list;
    }
    public function kardex(Articulo $articulo)
    {
        $articulo->marca = $articulo->Marca;
        $articulo->medida = $articulo->Medida;
        $articulo->categoria = $articulo->Categoria;
        $articulo->image = $articulo->ArticuloImages()->get()->first();
        if( $articulo->image!=null){
            $articulo->image->url = $articulo->image->image->UrlImage();
        }
        $articulo->inventarios = $articulo->Inventarios()->where('estado',1)->get();
        $articulo->ingresos = $articulo->inventarios->where('tipo',1)->sum('cantidad');
        $articulo->egresos = $articulo->inventarios->where('tipo',2)->sum('cantidad');
        $articulo->stock = $articulo->ingresos - $articulo->egresos;
        $articulo->valorizado = $articulo->stock * $articulo->venta;
        $articulo->inversion = $articulo->stock * $articulo->compra;
        $articulo->ganancia = $articulo->valorizado - $articulo->inversion;

        return $articulo;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario = new Inventario();
        $inventario->articulo_id = $request->articulo_id;
        $inventario->tipo = $request->tipo;
        $inventario->compra = $request->compra;
        $inventario->venta = $request->venta;
        $inventario->cantidad = $request->cantidad;
        $inventario->motivo = $request->motivo;
        $inventario->save();
        return $inventario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->estado= 0;
        $inventario->save();
    }
}
