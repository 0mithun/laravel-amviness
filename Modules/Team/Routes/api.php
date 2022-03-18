<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Team\Http\Controllers\Api\TeamController;

Route::middleware('auth:api')->get('/team', function (Request $request) {
    return $request->user();
});

Route::prefix('team')->group(function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::post('/', [TeamController::class, 'store']);
    Route::get('{team}', [TeamController::class, 'edit']);
    Route::put('{team}', [TeamController::class, 'update']);
    Route::delete('{team}', [TeamController::class, 'destroy']);
    Route::post('/update/order', [TeamController::class, 'updateOrder']);
});
