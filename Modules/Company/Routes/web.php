<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Controllers\CompanyController;

Route::prefix('company')->group(function () {
    Route::get('/', 'CompanyController@index');
});

Route::middleware(['auth:super_admin'])->group(function () {
    // Company Routes
    Route::prefix('company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('module.company.index');
        Route::get('/add', [CompanyController::class, 'create'])->name('module.company.create');
        Route::post('/add', [CompanyController::class, 'store'])->name('module.company.store');
        Route::get('/show/{company:username}', [CompanyController::class, 'show'])->name('module.company.show');
        Route::get('/edit/{company}', [CompanyController::class, 'edit'])->name('module.company.edit');
        Route::get('/status/change', [CompanyController::class, 'status_change'])->name('company.status.change');
        Route::put('/update/{company}', [CompanyController::class, 'update'])->name('module.company.update');
        Route::delete('/destroy/{company}', [CompanyController::class, 'destroy'])->name('module.company.destroy');
        Route::post('/list/view-change', [CompanyController::class, 'list_view_change'])->name('module.company.listing.change');
    });
});
