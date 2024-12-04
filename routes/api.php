<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeticioneController;

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

Route::controller(PagesController::class)->group(function() {
    Route::get('/', [\App\Http\Controllers\PagesController::class, 'home']);
});
Route::controller(\App\Http\Controllers\PeticioneController::class)->group(function () {
    Route::get('peticiones', 'index');
    Route::get('mispeticiones', 'listmine');
    Route::get('peticiones/{id}', 'show');
    Route::delete('peticiones/{id}', 'delete');
    Route::put('peticiones/firmar/{id}', 'firmar');
    Route::put('peticiones/{id}', 'update');
    Route::put('peticiones/estado/{id}', 'cambiarEstado');
    Route::post('peticiones', 'store');
});
Route::controller(\App\Http\Controllers\CategoriaController::class)->group(function () {

});
