<?php

use Illuminate\Support\Facades\Route;
use Modules\Attribute\Http\Controllers\AttributeController;
use Modules\Attribute\Http\Controllers\AttributeValueController;

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::name('module.')->prefix('attributes')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('attributes.index');
        Route::get('create', [AttributeController::class, 'create'])->name('attributes.create');
        Route::post('/', [AttributeController::class, 'store'])->name('attributes.store');
        Route::get('{attribute}', [AttributeController::class, 'show'])->name('attributes.show');
        Route::get('edit/{attribute}', [AttributeController::class, 'edit'])->name('attributes.edit');
        Route::put('{attribute}', [AttributeController::class, 'update'])->name('attributes.update');
        Route::delete('{attribute}', [AttributeController::class, 'destroy'])->name('attributes.destroy');

        Route::get('{attribute}/values', [AttributeValueController::class, 'index'])->name('attribute.value.index');
        Route::post('value', [AttributeValueController::class, 'store'])->name('attribute.value.store');
        Route::get('value/{value}/edit', [AttributeValueController::class, 'edit'])->name('attribute.value.edit');
        Route::put('value/{value}', [AttributeValueController::class, 'update'])->name('attribute.value.update');
        Route::delete('value/{value}', [AttributeValueController::class, 'destroy'])->name('attribute.value.destroy');
    });
});
