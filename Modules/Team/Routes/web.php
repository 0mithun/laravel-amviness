<?php

use Illuminate\Support\Facades\Route;
use Modules\Team\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function() {
    // Team Routes
    Route::prefix('team')->group(function() {
        Route::get('/',[TeamController::class, 'index'])->name('module.team.index');
        Route::get('/add',[TeamController::class, 'create'])->name('module.team.create');
        Route::post('/add',[TeamController::class, 'store'])->name('module.team.store');
        Route::get('/edit/{team}',[TeamController::class, 'edit'])->name('module.team.edit');
        Route::put('/update/{team}',[TeamController::class, 'update'])->name('module.team.update');
        Route::delete('/destroy/{team}',[TeamController::class, 'destroy'])->name('module.team.destroy');
        Route::post('/update/order',[TeamController::class, 'updateOrder'])->name('module.team.updateOrder');
    });
});
