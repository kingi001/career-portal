<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\EducationController;

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware('auth',)->group(function () {
    Route::get('/two-factor-authentication',[TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor-authentication',[TwoFactorController::class, 'verify'])->name('two-factor.verify');
});

require __DIR__.'/auth.php';

Route::middleware('auth',)->group(function () {
Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
Route::get('/personal-info', function () { return view('personal-info.personal-info');})->name('personal-info');

Route::resource('education',EducationController::class);

Route::get('/career', function () { return view('career.career-list');})->name('career');
Route::get('/referee', function () { return view('referee.index');})->name('referee');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   
});

// Route::middleware(['auth'])->group(function () {
//     Route::resource('education', EducationController::class);
// })->name('education');



