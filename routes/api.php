<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Recurso de Pedidos
    Route::apiResource('/pedidos', PedidoController::class);

    // Recurso de Categorías
    Route::apiResource('/categorias', CategoriaController::class);

    // Recurso de Productos
    Route::apiResource('/productos', ProductoController::class);
});


// Registro
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Test de arranque
// Route::get('/hola', function () {
//     return response()->json(['saludo' => 'Hola de vuelta']);
// });
