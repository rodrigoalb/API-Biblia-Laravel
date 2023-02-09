<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TestamentoController;
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

// Route::get('/testamento', [TestamentoController::class, 'index']);
// Route::post('/testamento', [TestamentoController::class, 'store']);
// Route::get('/testamento/{id}', [TestamentoController::class, 'show']);
// Route::put('/testamento/{id}', [TestamentoController::class, 'update']);
// Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);

// Route::get('/livro', [LivroController::class, 'index']);
// Route::post('/livro', [LivroController::class, 'store']);
// Route::get('/livro/{id}', [LivroController::class, 'show']);
// Route::put('/livro/{id}', [LivroController::class, 'update']);
// Route::delete('/livro/{id}', [LivroController::class, 'destroy']);

// Route::get('/versiculo', [VersiculoController::class, 'index']);
// Route::post('/versiculo', [VersiculoController::class, 'store']);
// Route::get('/versiculo/{id}', [VersiculoController::class, 'show']);
// Route::put('/versiculo/{id}', [VersiculoController::class, 'update']);
// Route::delete('/versiculo/{id}', [VersiculoController::class, 'destroy']);

//Refatoração para ficar menor a quantidade de linha de rotas

Route::apiResource('testamento', TestamentoController::class);
Route::apiResource('livro', LivroController::class);
Route::apiResource('versiculo', VersiculoController::class);

Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
