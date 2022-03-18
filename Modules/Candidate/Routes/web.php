<?php

use Illuminate\Support\Facades\Route;
use Modules\Candidate\Http\Controllers\CandidateController;

Route::prefix('candidate')->group(function () {
    Route::get('/', [CandidateController::class, 'index'])->name('module.candidate.index');
    Route::get('/add', [CandidateController::class, 'create'])->name('module.candidate.create');
    Route::post('/add', [CandidateController::class, 'store'])->name('module.candidate.store');
    Route::get('/show/{username}', [CandidateController::class, 'show'])->name('module.candidate.show');
    Route::get('/edit/{candidate}', [CandidateController::class, 'edit'])->name('module.candidate.edit');
    Route::put('/update/{candidate}', [CandidateController::class, 'update'])->name('module.candidate.update');
    Route::get('/status/change', [CandidateController::class, 'status_change'])->name('candidate.status.change');
    Route::delete('/destroy/{candidate}', [CandidateController::class, 'destroy'])->name('module.candidate.destroy');
    Route::post('/list/view-change', [CandidateController::class, 'list_view_change'])->name('module.candidate.listing.change');
});
