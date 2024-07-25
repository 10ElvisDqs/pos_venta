<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('/cajas', 'CajaController');
Route::post('/articuloImages/articulo/{articulo}', 'ArticuloImageController@store');
Route::post('/articuloImages/articulo/delete/{articuloImage}', 'ArticuloImageController@destroy');
Route::get('/articuloImages/articulo/{articulo}', 'ArticuloImageController@show');
Route::get('/dashboard', 'DashboardController@info');
Route::get('/reportes/ventas/{venta}', 'VentaController@pdf');
Route::apiResource('/cajaMovimientos', 'CajaMovimientoController');



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
