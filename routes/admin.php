<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::post('/get-resumes', [ResumeController::class, 'getResumes'])->name('admin.get-resumes');
        Route::get('/download-resume/{id}', [ResumeController::class, 'downloadResume'])->name('admin.download-resume');

        Route::get('download-resume/{id}', [ResumeController::class, 'downloadResume'])->name('admin.download-resume');
    });
});