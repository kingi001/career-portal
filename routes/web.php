<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\FileUploadController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth',)->group(function () {
    Route::get('/two-factor-authentication',[TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor-authentication',[TwoFactorController::class, 'verify'])->name('two-factor.verify');
});

require __DIR__.'/auth.php';

Route::middleware('auth',)->group(function () {
Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
Route::get('/personal-info', function () { return view('personal-info.personal-info');})->name('personal-info');
Route::get('/education', function () { return view('education.list-education');})->name('education');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   
});



