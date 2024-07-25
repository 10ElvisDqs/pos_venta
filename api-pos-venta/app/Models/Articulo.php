<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    public function Marca(){
        return $this->belongsTo(Marca::class);
    }
  
    public function Medida(){
        return $this->belongsTo(Medida::class);
    }
    public function Categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function Inventarios(){
        return $this->hasMany(Inventario::class);
    }
    public function ArticuloImages(){
        return $this->hasMany(ArticuloImage::class)->with(['Image'])->where('estado',1)->orderBy('id','desc');
    }
}
