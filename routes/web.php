<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TrekController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\TrekController as FrontendTrekController;
use App\Http\Controllers\TypePageController;
use App\Http\Controllers\BookingController;

// Frontend Routes
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/salajeet', function () {
    return view('salajeet');
})->name('salajeet');

Route::get('/how-to-apply', function () {
    return view('visa-guide');
})->name('visa-guide');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms-of-service');

Route::get('/trek/{slug}', [FrontendTrekController::class, 'show'])->name('trek.show');

// Dynamic Type Pages (Trending Treks, Expeditions, Tours, etc.)
Route::get('/type/{slug}', [TypePageController::class, 'index'])->name('type.index');

// Booking & Inquiry Routes
Route::get('/book', [BookingController::class, 'create'])->name('booking.create');
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/track', [BookingController::class, 'track'])->name('booking.track');
Route::post('/booking/track', [BookingController::class, 'lookup'])->name('booking.lookup');
Route::get('/booking/thankyou/{id}', [BookingController::class, 'thankyou'])->name('booking.thankyou');
Route::get('/booking/{id}/download', [BookingController::class, 'download'])->name('booking.download');

// Chatbot Route
Route::post('/chatbot/ask', [ChatbotController::class, 'chat'])->name('chatbot.ask');


// Admin Routes
Route::prefix('admin')->group(function () {
    // Guest routes (login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    });

    // Authenticated routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        
        // Types / Categories Management
        Route::resource('types', TypeController::class)->names('admin.types')->except(['show']);

        // Trek Management
        Route::resource('treks', TrekController::class)->names('admin.treks');
        Route::post('treks/{trek}/upload-image', [TrekController::class, 'uploadImage'])->name('admin.treks.upload-image');
        Route::put('treks/{trek}/images/{gallery}', [TrekController::class, 'updateImage'])->name('admin.treks.update-image');
        Route::delete('treks/{trek}/images/{gallery}', [TrekController::class, 'deleteImage'])->name('admin.treks.delete-image');
        Route::post('treks/{trek}/add-price', [TrekController::class, 'addPrice'])->name('admin.treks.add-price');
        Route::put('treks/{trek}/prices/{price}', [TrekController::class, 'updatePrice'])->name('admin.treks.update-price');
        Route::delete('treks/{trek}/prices/{price}', [TrekController::class, 'deletePrice'])->name('admin.treks.delete-price');

        // Bookings Management
        Route::get('bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
        Route::get('bookings/{booking}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
        Route::patch('bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
        Route::delete('bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');
        Route::get('bookings/export/csv', [AdminBookingController::class, 'export'])->name('admin.bookings.export');
    });
});
