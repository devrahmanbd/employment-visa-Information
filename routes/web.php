<?php

use App\Http\Controllers\Frontend\VisaInquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\VisaInformationController;
use App\Http\Controllers\Frontend\VisaEmailController;


// Home page
Route::get('/',[HomeController::class, 'index'])->name('home');
// About page
Route::get('/about',[AboutController::class, 'index'])->name('about');
// Visa Information page
Route::get('/visa-information',[VisaInformationController::class, 'index'])->name('visa-information');
// Visa Inquiry page
Route::get('/visa-inquiry',[VisaInquiryController::class, 'index'])->name('visa-inquiry');
// Visa Email page
Route::get('/visa-email',[VisaEmailController::class, 'index'])->name('visa-email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';