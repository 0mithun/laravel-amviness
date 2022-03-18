<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\Api\JobController;

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

Route::middleware('auth:api')->get('/job', function (Request $request) {
    return $request->user();
});

Route::prefix('job')->group(function() {
    Route::get('/',[JobController::class, 'index']);
    Route::post('/',[JobController::class, 'store']);
    Route::get('{job}',[JobController::class, 'edit']);
    Route::put('{job}',[JobController::class, 'update']);
    Route::delete('{job}',[JobController::class, 'destroy']);
});
