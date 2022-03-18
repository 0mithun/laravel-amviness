<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Brand\Http\Controllers\Api\BrandController;

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

Route::middleware('auth:api')->get('/brand', function (Request $request) {
    return $request->user();
});

Route::prefix('brand')->group(function() {
    Route::get('/',[BrandController::class, 'index']);
    Route::post('/',[BrandController::class, 'store']);
    Route::get('{brand}',[BrandController::class, 'edit']);
    Route::put('{brand}',[BrandController::class, 'update']);
    Route::delete('{brand}',[BrandController::class, 'destroy']);
    Route::delete('/brand/multiple/destroy',[BrandController::class, 'multipleDestroy']);
});
