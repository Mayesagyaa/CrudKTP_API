<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KTPController;

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
Route::get('/ktp', [KTPController::class, 'index']);
Route::post('/ktp/create', [KTPController::class, 'store']);
Route::get('/ktp/show/{id}', [KTPController::class, 'show']);
Route::post('/ktp/update/{id}', [KTPController::class, 'update']);
Route::get('/ktp/delete/{id}', [KTPController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
