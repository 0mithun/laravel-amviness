<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Newsletter\Http\Controllers\Api\NewsletterController;

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

Route::middleware('auth:api')->get('/newsletter', function (Request $request) {
    return $request->user();
});

Route::prefix('newsletter')->group(function () {
    Route::get('/', [NewsletterController::class, 'index']);
    Route::post('/', [NewsletterController::class, 'store']);
    Route::get('{newsletter}', [NewsletterController::class, 'edit']);
    Route::put('{newsletter}', [NewsletterController::class, 'update']);
    Route::delete('{newsletter}', [NewsletterController::class, 'destroy']);
});
