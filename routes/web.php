<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Karim007\LaravelCaptcha\Facades\Captcha;
use App\Http\Controllers\Backend\VisaController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\VisaEmailController;
use App\Http\Controllers\Frontend\ManualVisaController;
use App\Http\Controllers\Backend\AdminContactController;
use App\Http\Controllers\Frontend\VisaInquiryController;
use App\Http\Controllers\Backend\AdminManualVisaController;
use App\Http\Controllers\Frontend\VisaInformationController;
use App\Http\Controllers\Frontend\KuwaitVisaAppsModelController;
use App\Http\Controllers\Frontend\DownloadEmploymentVisaController;

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
Route::get('/visa-download', [VisaInquiryController::class, 'download'])->name('visa.download');
// Visa Email page
Route::get('/visa-email', [VisaEmailController::class, 'index'])->name('visa-email');

Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');

// kuwait evisa verification
Route::get('/kuwait-evisa-verification',[KuwaitVisaAppsModelController::class,'index'])->name('kuwait-evisa-verification');
Route::get('/web-app-visa-inquiries', [KuwaitVisaAppsModelController::class, 'visaInquiries'])->name('web-app-visa-inquiries');

Route::post('/web-app-evisa-details', [KuwaitVisaAppsModelController::class, 'visaDetails'])->name('web-app-evisa-details');
// captcha
Route::get('/captcha', function () {
    return Captcha::create();
});
// Download Employment Visa
Route::get('/download-employment-visa', [DownloadEmploymentVisaController::class, 'downloadEmploymentVisa'])->name('download-employment-visa');


// ManualVisaController
Route::get('/manual-visa', [ManualVisaController::class, 'manualVisa'])->name('manual-visa');

    Route::get('/manual-visa-download', [ManualVisaController::class, 'downloadManualVisaFromFrontend'])
    ->name('frontend-manual-visa-download');

Route::get('/captcha', function () {
    $captcha_text = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ123456789"), 0, 6);

    Session::put('captcha', $captcha_text);

    return response()->json(['captcha' => $captcha_text]);
});



// visa verification
Route::get('/visa-verification-scan',[KuwaitVisaAppsModelController::class,'verificationScan'])->name('visa-verification-scan');
Route::get('/barcode-search', [KuwaitVisaAppsModelController::class, 'search'])->name('barcode.search');
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route group for authenticated users

Route::resource('frontend-manual-visas', AdminManualVisaController::class);



Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Visa
    Route::resource('visas', VisaController::class);
    // manual visa
    Route::resource('admin-manual-visas', AdminManualVisaController::class);
    Route::get('/manual-visa-download/{id}', [AdminManualVisaController::class, 'downloadManualVisa'])
    ->name('manual-visa-download');

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