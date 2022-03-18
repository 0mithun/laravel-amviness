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

use Illuminate\Support\Facades\Route;
use Modules\Banner\Http\Controllers\BannerController;

// Route::prefix('banner')->group(function () {
//     Route::get('/', 'BannerController@index');
// });





Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/baanner'], function(){
    // Job Routes
    Route::get('/', [BannerController::class, 'index'])->name('module.banner.index');
    Route::get('/add', [BannerController::class, 'create'])->name('module.banner.create');
    Route::post('/add', [BannerController::class, 'store'])->name('module.banner.store');
    Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('module.banner.edit');
    Route::put('/update/{banner}', [BannerController::class, 'update'])->name('module.banner.update');
    Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('module.banner.destroy');

});
