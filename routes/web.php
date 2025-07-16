<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\EducationalBackgroundController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\JobOpeningController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\AuditLogController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/contactus', function () {
    return "This is Contact Us Page";
});


Route::prefix('client')->middleware('auth:web')->group(function() {
 Route::resource('users', UserController::class);
});

Route::name('client.')->prefix('client')->group(function () {
    Route::resource('applicants', ApplicantController::class);
    Route::resource('work_experiences', WorkExperienceController::class);
    Route::resource('educations', EducationalBackgroundController::class);
    Route::resource('medicals', MedicalController::class);
    Route::resource('jobs', JobOpeningController::class);
    Route::resource('job_applications', JobApplicationController::class);
    Route::resource('finances', FinanceController::class);
    Route::resource('audit_logs', AuditLogController::class);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');