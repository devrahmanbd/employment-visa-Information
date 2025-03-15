<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\VisaController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\VisaEmailController;
use App\Http\Controllers\Backend\AdminContactController;
use App\Http\Controllers\Frontend\VisaInquiryController;
use App\Http\Controllers\Frontend\VisaInformationController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');
// About page
Route::get('/about', [AboutController::class, 'index'])->name('about');
// Visa Information page
Route::get('/visa-information', [VisaInformationController::class, 'index'])->name('visa-information');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Visa Inquiry page
Route::get('/visa-inquiry',[VisaInquiryController::class, 'index'])->name('visa-inquiry');
// visa find
Route::get('/visa-find',[VisaInquiryController::class, 'find'])->name('visa.find');
// visa details
Route::get('/visa-details/{id}',[VisaInquiryController::class, 'details'])->name('visa.details');
Route::get('/visa-inquiry', [VisaInquiryController::class, 'index'])->name('visa-inquiry');
// Visa Email page
Route::get('/visa-email', [VisaEmailController::class, 'index'])->name('visa-email');

Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');

// captcha
Route::get('/captcha', function () {
    return Captcha::create();
});


Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route group for authenticated users

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Visa
    Route::resource('visas', VisaController::class);
    // Contact
    Route::resource('contacts', AdminContactController::class);
    // Users
    Route::resource('users', UsersController::class);
    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('settings.update');
    
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';