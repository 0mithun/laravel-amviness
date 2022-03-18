<?php

use Illuminate\Support\Facades\Route;
use Modules\Priceplan\Http\Controllers\PlanfeatureController;
use Modules\Priceplan\Http\Controllers\PriceplanController;


Route::middleware(['auth'])->group(function () {
    // Priceplan  Routes
    Route::prefix('priceplan')->group(function () {
        Route::get('/', [PriceplanController::class, 'index'])->name('module.priceplan.index');
        Route::get('/add', [PriceplanController::class, 'create'])->name('module.priceplan.create');
        Route::post('/add', [PriceplanController::class, 'store'])->name('module.priceplan.store');
        Route::get('/edit/{priceplan}', [PriceplanController::class, 'edit'])->name('module.priceplan.edit');
        Route::put('/update/{priceplan}', [PriceplanController::class, 'update'])->name('module.priceplan.update');
        Route::delete('/destroy/{priceplan}', [PriceplanController::class, 'destroy'])->name('module.priceplan.destroy');
        Route::get('/status/change', [PriceplanController::class, 'status_change'])->name('priceplan.status.change');
        Route::get('/features/{priceplan}', [PlanfeatureController::class, 'index'])->name('module.priceplan.feature');
        Route::delete('/destroy/feature/{feature}', [PlanfeatureController::class, 'destroy'])->name('feature.priceplan.destroy');
        Route::post('/features/update/order', [PlanfeatureController::class, 'updateOrder'])->name('feature.priceplan.updateOrder');


        Route::get('/feature/add/{priceplan_id}', [PlanfeatureController::class, 'create'])->name('feature.priceplan.create');
        Route::post('/feature/add/{priceplan}', [PlanfeatureController::class, 'store'])->name('feature.priceplan.store');
    });
});
