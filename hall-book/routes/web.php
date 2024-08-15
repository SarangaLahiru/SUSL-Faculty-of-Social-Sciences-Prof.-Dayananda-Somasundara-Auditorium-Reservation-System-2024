<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [BookingController::class, 'showCalendar'])->name('show-calendar');
Route::get('/calendar', [BookingController::class, 'showCalendar2'])->name('show-calendar2');
Route::get('/staff', function () {
    return view('services');
});
Route::get('/resources', function () {
    return view('resources');
});
Route::get('/support', function () {
    return view('support');
});

// Booking Routes
Route::post('/check-multiple-days-availability', [AvailabilityController::class, 'checkMultipleDaysAvailability'])
    ->middleware('auth')
    ->name('check-multiple-days-availability');

Route::get('/create-booking', [BookingController::class, 'create'])->name('createBookingForm');
Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Admin Login Routes
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [Controller::class, 'index'])->name('admin.dashboard');
        Route::get('/password/reset', [Controller::class, 'showResetForm'])->name('admin.password.reset');
        Route::post('/password/reset', [Controller::class, 'reset'])->name('admin.password.update');

        // Report Routes
        Route::get('/report/analytics', [Controller::class, 'generateAnalyticsReport'])->name('report.analytics');
        Route::get('/report/full', [Controller::class, 'generateFullReport'])->name('report.full');

        // Account Management
        Route::get('/accounts', [Controller::class, 'seeAccounts'])->name('admin.accounts')->middleware('check.role:admin');
        Route::get('/analytics', [Controller::class, 'indexC'])->name('admin.analytics')->middleware('check.role:admin');

        // Booking Management
        Route::get('/booking/{id}', [Controller::class, 'showBooking'])->name('admin.booking.show')->middleware('check.role:admin');
        Route::post('/booking/{id}/accept', [BookingController::class, 'accept'])->name('booking.accept')->middleware('check.role:admin');
        Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject')->middleware('check.role:admin');
        Route::get('/bookingview/{id}', [Controller::class, 'showviewBooking'])->name('adminview.booking.show');
    });
});

// Customer Authentication Routes
Route::get('login', [CustomerController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomerController::class, 'login']);
Route::post('logout', [CustomerController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [CustomerController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [CustomerController::class, 'register']);

// Account Management
Route::get('account', [CustomerController::class, 'account'])->middleware('auth')->name('account');

// Password Reset Routes
Route::get('password/reset', [CustomerController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [CustomerController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [CustomerController::class, 'showPasswordResetForm'])->name('password.reset');
Route::post('password/reset', [CustomerController::class, 'reset'])->name('password.update');