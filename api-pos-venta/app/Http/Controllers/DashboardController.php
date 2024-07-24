<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Venta;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function info(){
        return [
            "articulos"=>Articulo::where('estado',1)->get()->count(),
            "usuarios"=>User::where('estado',1)->get()->count(),
            "ventas"=>Venta::where('estado',1)->get()->sum('total'),
            "compras"=>Compra::where('estado',1)->get()->sum('total'),
            "meses"=>$this->VentasMensual(),
        ];
    }
    public function VentasMensual()
    {
        $ventas= Venta::select(
            DB::raw('sum(total) as total'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes")
        )->where('estado',1)
            ->groupBy('mes')
            ->get();
            return $ventas;
    }
}
