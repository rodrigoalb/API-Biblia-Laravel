<?php

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

Route::get('/testamento', [TestamentoController::class, 'index']);
Route::post('/testamento', [TestamentoController::class, 'store']);
Route::get('/testamento/{id}', [TestamentoController::class, 'show']);
Route::put('/testamento/{id}', [TestamentoController::class, 'update']);
Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
