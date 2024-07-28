<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\CajaVenta;
use App\Models\Cliente;
use App\Models\VentaInventario;
use App\Models\Inventario;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = Venta::where('estado',1)->get();
        $list = [];
        foreach($venta as $m){
             $m->cliente =  Cliente::select('nombre', 'paterno', 'materno')->find($m->cliente );

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
        $venta = new Venta();
        $venta->total = $request->total;
        $venta->pago = $request->pago;
        $venta->cambio = $request->cambio;
        $venta->tipo = $request->tipo;
        $venta->cliente = $request->cliente;
        $venta->motivo = $request->motivo;
        $venta->save();
        $numero = Venta::all()->count()+1;
        if(isset($request->carrito)){
            if(!empty($request->carrito)){
                foreach($request->carrito as $m){
                    $articulo = $m['articulo'];
                    $inventario = new Inventario();
                    $inventario->articulo_id = $articulo['id'];
                    $inventario->tipo = 2;
                    $inventario->compra = $articulo['compra'];
                    $inventario->venta = $articulo['venta'];
                    $inventario->cantidad = $m['cantidad'];
                    $inventario->motivo = "Venta #".$numero;
                    $inventario->save();
                    $ventaInventario = new VentaInventario();
                    $ventaInventario->inventario_id = $inventario->id;
                    $ventaInventario->venta_id = $venta->id;
                    $ventaInventario->cantidad = $m['cantidad'];
                    $ventaInventario->precio = $m['precio'];
                    $ventaInventario->save();
                }
            }
        }
        if(isset($request->caja_id)){
            $cajaVenta = new CajaVenta();
            $cajaVenta->caja_id = $request->caja_id;
            $cajaVenta->venta_id = $venta->id;
            $cajaVenta->monto = $venta->total;
            $cajaVenta->save();
        }
        return $this->show($venta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $venta->venta_inventarios = $venta->VentaInventarios()->with(['Inventario'=>function($i){
            $i->with(['Articulo'=>function($a){
                $a->with(['Marca','Categoria','Medida']);
            }]);
        }])->get();
        $venta->fecha = $venta->created_at->format('Y-m-d');
        $venta->url_pdf = url('api/reportes/ventas/'.$venta->id);
        return $venta;
    }
    public function pdf(Venta $venta)
    {
        $sucursal = Sucursal::all()->first();
        $venta = $this->show($venta);
        $venta->cliente =  Cliente::select('nombre', 'paterno', 'materno')->find($venta->cliente );
        $venta->sucursal = $sucursal;
        $pdf = PDF::loadView('reports.venta', ["venta"=>$venta]);
        return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->estado =0;
        $venta->save();
        $venta->caja_venta = $venta->CajaVenta;
        $venta->caja_venta->estado = 0;
        $venta->caja_venta->save();

    }
}
