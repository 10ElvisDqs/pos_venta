<?php

namespace App\Http\Controllers;

use App\Models\ArticuloImage;
use App\Models\Articulo;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticuloImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Articulo $articulo)
    {
        $file = $request->file('file')->store('public/articulos');
        $url = Storage::url($file);
        $image = new Image();
        $image->path = $url;
        $image->save();
        $ArticuloImage = new ArticuloImage();
        $ArticuloImage->image_id = $image->id;
        $ArticuloImage->articulo_id = $articulo->id;
        $ArticuloImage->save();
        return $ArticuloImage;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticuloImage  $articuloImage
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        $articulo->marca = $articulo->Marca;
        $articulo->categoria = $articulo->Categoria;
        $articulo->articulo_images = $articulo->ArticuloImages()->get()->each(function($i){
            $i->url = $i->image->UrlImage();
        });
        return $articulo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticuloImage  $articuloImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticuloImage $articuloImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticuloImage  $articuloImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticuloImage $articuloImage)
    {
        $articuloImage->estado = 0;
        $articuloImage->save();
    }
}
