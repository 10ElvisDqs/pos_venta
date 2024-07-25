<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloImage extends Model
{
    use HasFactory;
    public function Image(){
        return $this->belongsTo(Image::class);
    }
}
