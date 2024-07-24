<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public function VentaInventarios(){
        return $this->hasMany(VentaInventario::class);
    }
    public function CajaVenta(){
        return $this->hasOne(CajaVenta::class);
    }
}
