<?php
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfessionalQualificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInformationController;
use Illuminate\Support\Facades\Route;



//Guest User Routes
require __DIR__.'/auth.php';
Route::get('/get-counties', [UserInformationController::class, 'getCounties']);
Route::get('/get-subcounties/{countyId}', [UserInformationController::class, 'getSubCounties']);
Route::get('/get-wards/{subcountyId}', [UserInformationController::class, 'getWards']);
 // OTP Verification Routes (No OTP check needed here)
Route::resource('verify',OTPController::class);
Route::post('/resend-otp', [OTPController::class, 'resend'])->name('otp.resend');

Route::middleware(['auth','otp_verified'])->group(function () {
// Dashboard and Other  Secured Routes
Route::get('/', function () { return view('dashboard');})->name('dashboard');
Route::get('/personal-information', [UserInformationController::class, 'create'])->name('personal-info.show');
Route::post('/personal-information', [UserInformationController::class, 'store'])->name('personal-info.store');
//Resource Routes
Route::resource('education',EducationController::class);
Route::resource('qualifications', ProfessionalQualificationController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('employment', EmploymentHistoryController::class);
Route::resource('referees', RefereeController::class);
Route::resource('documents', DocumentUploadController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::get('/roles/{role}/give-permission', [RoleController::class, 'addPermissionToRole'])->name('roles.givePermissions');
Route::put('/roles/{role}/give-permission', [RoleController::class, 'givePermissionToRole']);
Route::resource('users', UserController::class);



Route::get('/application-submission', function () { return view('applicationstatus.index');})->name('application');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








