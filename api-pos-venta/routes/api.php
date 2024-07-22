<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
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
Route::prefix('')->group( function (){

    Route::post('/login', [UserController::class, 'login']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/cajas', CajaController::class);
    Route::resource('/marcas',MarcaController::class);
    Route::resource('/medidas',MedidaController::class);
    Route::resource('/categorias',CategoriaController::class);
    Route::resource('/articulos',ArticuloController::class);
    Route::get('/inventarios/kardex/{articulo}', [InventarioController::class, 'kardex']);
    Route::apiResource('/inventarios', InventarioController::class);
    Route::apiResource('/compras', CompraController::class);
    Route::apiResource('/ventas', VentaController::class);
    Route::apiResource('/clientes', ClienteController::class);
    Route::apiResource('/sucursals', SucursalController::class);


});
