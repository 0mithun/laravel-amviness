<?php

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

use Modules\Setting\Http\Controllers\SettingController;

Route::prefix('setting')->group(function() {
    Route::get('/',[SettingController::class, 'index'])->name('module.setting.index');
    Route::post('/add',[SettingController::class, 'store'])->name('module.setting.store');
    Route::put('/update/{setting}',[SettingController::class, 'update'])->name('module.setting.update');
    Route::delete('/destroy/{id}',[SettingController::class, 'destroy'])->name('module.setting.destroy');
});
