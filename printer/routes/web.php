<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'printer'],function(){

    Route::post('test','PrinterController@test');
    Route::post('venta','PrinterController@venta');
});


Route::get('/', function () {
    return view('welcome');
});
