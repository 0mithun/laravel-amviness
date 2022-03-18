<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\ContactController;

Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/contact', ], function(){
        Route::get('/',[ContactController::class, 'index'])->name('module.contact.index');
        Route::delete('/destroy/{contact}',[ContactController::class, 'destroy'])->name('module.contact.destroy');
});
