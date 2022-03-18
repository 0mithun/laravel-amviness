<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Portfolio\Http\Controllers\Api\PortfolioController;

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

Route::middleware('auth:api')->get('/portfolio', function (Request $request) {
    return $request->user();
});


Route::prefix('portfolio')->group(function() {
    Route::get('/',[PortfolioController::class, 'index']);
    Route::post('/',[PortfolioController::class, 'store']);
    Route::get('{portfolio}',[PortfolioController::class, 'edit']);
    Route::put('{portfolio}',[PortfolioController::class, 'update']);
    Route::delete('{portfolio}',[PortfolioController::class, 'destroy']);
    Route::delete('/multiple/destroy',[PortfolioController::class, 'multipleDestroy']);
});
