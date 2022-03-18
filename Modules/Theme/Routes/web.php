<?php

use Illuminate\Support\Facades\Route;
use Modules\Theme\Http\Controllers\ThemeController;

Route::post('mode/change', [ThemeController::class, 'mode_change'])->name('mode.change');
