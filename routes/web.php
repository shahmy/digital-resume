<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\DownloadResumeController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/resume', [ResumeController::class, 'getResume']);
Route::get('/download-pdf', DownloadResumeController::class)->name('download-pdf');
