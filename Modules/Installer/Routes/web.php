<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Modules\Installer\Http\Controllers\InstallerController;

Route::prefix('app/install')->group(function () {
    Route::get('/', [InstallerController::class, 'index'])->name('installer.index');
    Route::post('/', [InstallerController::class, 'app_install'])->name('app.install');
});

Route::get('fresh-database/{secret}', function ($secret) {
    if (decrypt($secret) == 'hello') {
        Artisan::call('migrate:fresh --seed');
        Artisan::call('storage:link');
        Storage::disk('local')->put('installed', 'App install done');
        return redirect(route('index'));
    }
});
