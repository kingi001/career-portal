<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\ProfessionalQualificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\UserInformationController;
use Illuminate\Support\Facades\Route;

//Guest User Routes
require __DIR__.'/auth.php';

Route::get('/get-counties', [UserInformationController::class, 'getCounties']);
Route::get('/get-subcounties/{countyId}', [UserInformationController::class, 'getSubCounties']);
Route::get('/get-wards/{subcountyId}', [UserInformationController::class, 'getWards']);


Route::middleware(['auth'])->group(function () {
 // OTP Verification Routes (No OTP check needed here)
 Route::get('/otp-verify', [OTPController::class, 'showOtpForm'])->name('otp.verify');
 Route::post('/otp-verify', [OTPController::class, 'verifyOtp']);
 Route::get('/send-otp', [OTPController::class, 'sendOtp'])->name('otp.send');

// Dashboard and Other  Secured Routes
Route::get('/', function () { return view('dashboard');})->name('dashboard');
Route::get('/personal-information', [UserInformationController::class, 'create'])->name('personal-info.show');
Route::post('/personal-information', [UserInformationController::class, 'store'])->name('personal-info.store');


Route::get('/application-submission', function () { return view('applicationstatus.index');})->name('application');


Route::resource('/education',EducationController::class);
Route::resource('/qualifications', ProfessionalQualificationController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('employment', EmploymentHistoryController::class);
Route::resource('referees', RefereeController::class);
Route::resource('documents', DocumentController::class);


Route::get('/referee', function () { return view('referee.index');})->name('referee');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





