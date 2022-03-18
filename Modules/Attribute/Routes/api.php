<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Attribute\Http\Controllers\Api\AttributeController;
use Modules\Attribute\Http\Controllers\Api\AttributeValueController;

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

Route::middleware('auth:api')->get('/attribute', function (Request $request) {
    return $request->user();
});

Route::prefix('attribute')->group(function () {
    Route::get('/', [AttributeController::class, 'index']);
    Route::post('/', [AttributeController::class, 'store']);
    Route::get('{attribute}', [AttributeController::class, 'show']);
    Route::get('{attribute}', [AttributeController::class, 'edit']);
    Route::put('{attribute}', [AttributeController::class, 'update']);
    Route::delete('{attribute}', [AttributeController::class, 'destroy']);
});

Route::prefix('attribute/value')->group(function () {
    Route::get('{attribute}', [AttributeValueController::class, 'index']);
    Route::post('/', [AttributeValueController::class, 'store']);
    Route::get('{value}/edit', [AttributeValueController::class, 'edit']);
    Route::put('{value}', [AttributeValueController::class, 'update']);
    Route::delete('{value}', [AttributeValueController::class, 'destroy']);
});
