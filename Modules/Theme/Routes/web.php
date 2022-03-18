<?php

use Illuminate\Support\Facades\Route;
use Modules\Theme\Http\Controllers\ThemeController;


Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/mode', ], function(){
    Route::post('change', [ThemeController::class, 'mode_change'])->name('mode.change');

});

