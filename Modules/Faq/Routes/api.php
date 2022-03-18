<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Faq\Http\Controllers\Api\FaqController;

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

Route::middleware('auth:api')->get('/faq', function (Request $request) {
    return $request->user();
});

Route::prefix('faq')->group(function () {
    Route::get('/', [FaqController::class, 'index']);
    Route::post('/', [FaqController::class, 'store']);
    Route::get('{faq}', [FaqController::class, 'edit']);
    Route::put('{faq}', [FaqController::class, 'update']);
    Route::delete('{faq}', [FaqController::class, 'destroy']);
});
