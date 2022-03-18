<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Priceplan\Http\Controllers\Api\PriceplanController;

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

Route::middleware('auth:api')->get('/priceplan', function (Request $request) {
    return $request->user();
});

Route::prefix('priceplan')->group(function () {
    Route::get('/', [PriceplanController::class, 'index']);
    Route::post('/', [PriceplanController::class, 'store']);
    Route::get('{priceplan}', [PriceplanController::class, 'edit']);
    Route::put('{priceplan}', [PriceplanController::class, 'update']);
    Route::delete('{priceplan}', [PriceplanController::class, 'destroy']);
});
