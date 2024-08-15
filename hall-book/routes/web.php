<?php


use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

// Route::get('/calendar', function () {
//     return view('calendar');
// });
// Route::get('/calendar', function () {
//     return view('calendar');
// });



Route::get('/staff', function () {
    return view('services');
});
Route::get('/resources', function () {
    return view('resources');
});
Route::get('/support', function () {
    return view('support');
});



// Route::get('/dash', function () {
//     return view('admin.dashboard');
// });
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
Route::get('/', [BookingController::class, 'showCalendar'])->name('show-calendar');
Route::get('/calendar', [BookingController::class, 'showCalendar2'])->name('show-calendar2');
// Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
// Route::post('/booked', [BookingController::class, 'store'])->name('booked');
// Route::get('/createBooking', [BookingController::class, 'createBookingForm'])->name('create-booking-form');
Route::post('/check-multiple-days-availability', [AvailabilityController::class, 'checkMultipleDaysAvailability'])->middleware('auth')->name('check-multiple-days-availability');
Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
// Route::post('/booked', [BookingController::class, 'store'])->name('booking.store');
Route::get('/create-booking', [BookingController::class, 'create'])->name('createBookingForm');
Route::post('/store-booking', [BookingController::class, 'store'])->name('storeBooking');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Admin Login Routes

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::middleware('auth.admin')->group(function () {
        Route::get('/password/reset', [Controller::class, 'showResetForm'])->name('admin.password.reset');
        Route::post('/password/reset', [Controller::class, 'reset'])->name('admin.password.update');
        Route::get('/dashboard', [Controller::class, 'index'])->name('admin.dashboard');

        Route::get('/report/analytics', [Controller::class, 'generateAnalyticsReport'])->name('report.analytics');
        Route::get('/report/full', [Controller::class, 'generateFullReport'])->name('report.full');

        Route::get('/accounts', [Controller::class, 'seeAccounts'])->name('admin.accounts')->middleware('check.role:admin');
        Route::get('/analytics', [Controller::class, 'indexC'])->name('admin.analytics')->middleware('check.role:admin');
        Route::get('/booking/{id}', [App\Http\Controllers\Controller::class, 'showBooking'])->name('admin.booking.show')->middleware('check.role:admin');
        Route::post('/booking/{id}/accept', [BookingController::class, 'accept'])->name('booking.accept')->middleware('check.role:admin');;

        Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject')->middleware('check.role:admin');;
        Route::get('/bookingview/{id}', [App\Http\Controllers\Controller::class, 'showviewBooking'])->name('adminview.booking.show');

    });

});



// Login Routes
Route::get('login', [CustomerController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomerController::class, 'login']);

// Logout Route
Route::post('logout', [CustomerController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [CustomerController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [CustomerController::class, 'register']);

// Account Page
Route::get('account', [CustomerController::class, 'account'])->middleware('auth')->name('account');

Route::get('password/reset', [CustomerController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [CustomerController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [CustomerController::class, 'showPasswordResetForm'])->name('password.reset');
Route::post('password/reset', [CustomerController::class, 'reset'])->name('password.update');