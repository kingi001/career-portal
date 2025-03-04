<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//Guest User Routes
require __DIR__.'/auth.php';
Route::get('/get-counties/{country_id}', [PersonalInformationController::class, 'getCounties']);
Route::get('/get-constituencies/{county_id}', [PersonalInformationController::class, 'getConstituencies']);
Route::get('/get-wards/{constituency_id}', [PersonalInformationController::class, 'getWards']);

Route::middleware(['auth'])->group(function () {
 // OTP Verification Routes (No OTP check needed here)
 Route::get('/otp-verify', [OTPController::class, 'showOtpForm'])->name('otp.verify');
 Route::post('/otp-verify', [OTPController::class, 'verifyOtp']);
 Route::get('/send-otp', [OTPController::class, 'sendOtp'])->name('otp.send');

// Dashboard and Other  Secured Routes

Route::get('/', function () { return view('dashboard');})->name('dashboard');
// Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
// Route::get('/personal-info', function () { return view('personal-info.personal-info');})->name('personal-info');
Route::get('/personal-information', [PersonalInformationController::class, 'show'])->name('personal-info.show');
    Route::post('/personal-information', [PersonalInformationController::class, 'storeOrUpdate'])->name('personal-info.store');

Route::get('/documentUpload', function () { return view('documentupload.index');})->name('documentUpload');
Route::get('/application-submission', function () { return view('applicationstatus.index');})->name('application');


Route::resource('/education',EducationController::class);

Route::get('career', function () { return view('career.career-list');})->name('career');
Route::get('/referee', function () { return view('referee.index');})->name('referee');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





