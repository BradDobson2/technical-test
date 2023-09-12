<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComponentGradeController;
use App\Http\Controllers\Api\ComponentTypeController;
use App\Http\Controllers\Api\WindFarmController;
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

Route::post('/auth', AuthController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/component-types', ComponentTypeController::class);
    Route::get('/component-grades', ComponentGradeController::class);
    Route::get('/wind-farm', WindFarmController::class);
});
