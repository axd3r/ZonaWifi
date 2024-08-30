<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AsignamientoCodigosController as Asignamiento;
use App\Http\Controllers\Api\V1\CodigoWifiController as Codigos;
use App\Http\Controllers\Api\V1\TipoUsuarioController as TipoUsuario;
use App\Http\Controllers\Api\V1\VentasController as Ventas;
use App\Http\Controllers\Api\AuthController as Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [Auth::class, 'login']);
Route::post('/register', [Auth::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
Route::post('/token-auth', [Auth::class, 'authToken']);
});
Route::apiResource('/v1/asignamiento', Asignamiento::class);
Route::apiResource('/v1/codigos', Codigos::class);
Route::apiResource('/v1/tipo', TipoUsuario::class);
Route::apiResource('/v1/ventas', Ventas::class);